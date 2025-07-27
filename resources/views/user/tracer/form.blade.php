<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control" required>
        <option value="">Pilih Status</option>
        <option value="bekerja" {{ old('status', $tracer->status ?? '') == 'bekerja' ? 'selected' : '' }}>Bekerja</option>
        <option value="wiraswasta" {{ old('status', $tracer->status ?? '') == 'wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
        <option value="melanjutkan" {{ old('status', $tracer->status ?? '') == 'melanjutkan' ? 'selected' : '' }}>Melanjutkan Pendidikan</option>
        <option value="tidak bekerja" {{ old('status', $tracer->status ?? '') == 'tidak bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
    </select>
</div>

<div id="soal-form" class="space-y-4"></div>

@php
    $currentStatus = old('status', $tracer->status ?? '');
    $initialValues = [];

    $statusQuestions = [
'bekerja' => [
    [
        'type' => 'select',
        'label' => 'Berapa lama anda mendapatkan pekerjaan',
        'name' => 'soal_1',
        'options' => [
            'Sebelum lulus',
            'Ketika lulus',
            'Kurang dari 3 bulan setelah lulus',
            'Lebih dari 3 bulan setelah lulus',
            'Lebih dari 6 bulan setelah lulus',
            'Lebih dari 12 bulan setelah lulus'
        ]
    ],
    'Berapa rata-rata pendapatan per bulan anda (Take Home Pay)',
    'Lokasi Tempat Anda Bekerja (Provinsi)',
    'Lokasi Tempat Anda Bekerja (Kota / Kabupaten)',
    [
        'type' => 'select',
        'label' => 'Jenis Perusahaan tempat anda bekerja',
        'name' => 'soal_5',
        'options' => [
            'Instansi Pemerintah',
            'Instansi Swasta',
            'Badan Usaha Milik Negara (BUMN)',
            'Badan Usaha Milik Daerah (BUMD)',
            'Lembaga Pendidikan',
            'Lainnya'
        ]
    ],
    'Nama Perusahaan tempat anda bekerja',
    [
        'type' => 'select',
        'label' => 'Kategori perusahaan tempat anda bekerja',
        'name' => 'soal_7',
        'options' => [
            'Lokal/wilayah/wiraswasta tidak berbadan hukum',
            'Nasional Berbadan Hukum',
            'Multinasional/Internasional'
        ]
    ],
    [
        'type' => 'select',
        'label' => 'Informasi yang anda dapatkan untuk mencari pekerjaan',
        'name' => 'soal_8',
        'options' => [
            'Koran / Media Massa',
            'Internet',
            'Bursa Kerja / Jobfair',
            'Bagian Kemahasiswaan / Jurusan / Grup Alumni',
            'Lainnya'
        ]
    ]
],
        'wiraswasta' => [
    [
        'type' => 'select',
        'label' => 'Apakah jabatan/posisi anda ketika Berwirausaha',
        'name' => 'soal_1',
        'options' => [
            'Pemilik Usaha',
            'Co-Founder / Mitra Usaha',
            'Manajer / Pengelola Usaha',
            'Staf / Pelaksana Operasional',
            'Lainnya'
        ]
    ],
    'Nama Usaha anda',
    'Pendapatan per bulan anda',
    'Bidang Usaha',
    'Berapa lama anda memulai usaha'
],
        'melanjutkan' => [
            'Jenjang melanjutkan',
            'Nama Perguruan Tinggi',
            'Nama Program Studi',
            'Tanggal Bulan Tahun Masuk',
            [
        'type' => 'select',
        'label' => 'Sumber Biaya',
        'name' => 'soal_5',
        'options' => [
            'Beasiswa',
            'Biaya Sendiri',
            'Orang Tua',
            'Lainnya'
        ]
    ],
        ],
        'tidak bekerja' => [
            'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail)?',
            'Berapa banyak yang merespons lamaran anda?',
            'Berapa banyak yang mengundang anda untuk wawancara?'
        ]
    ];

    if (isset($tracer)) {
        $soalCount = isset($statusQuestions[$currentStatus]) ? count($statusQuestions[$currentStatus]) : 0;
        for ($i = 1; $i <= $soalCount; $i++) {
            $soalValue = old("soal_$i", $tracer->alumni->{$currentStatus}->{"soal_$i"} ?? '');
            $initialValues["soal_$i"] = $soalValue;
        }
    } else {
        $soalCount = isset($statusQuestions[$currentStatus]) ? count($statusQuestions[$currentStatus]) : 0;
        for ($i = 1; $i <= $soalCount; $i++) {
            $soalValue = old("soal_$i", '');
            $initialValues["soal_$i"] = $soalValue;
        }
    }
@endphp

<script>
    const statusQuestions = @json($statusQuestions);
    const initialValues = @json($initialValues);

    function renderSoal(status, values = {}) {
        const container = document.getElementById('soal-form');
        container.innerHTML = '';

        if (!status || !statusQuestions[status]) return;

        statusQuestions[status].forEach((question, index) => {
            const questionNumber = index + 1;
            let fieldName = `soal_${questionNumber}`;
            let fieldValue = values[fieldName] || '';
            let label = '';
            let elementHTML = '';

            if (typeof question === 'object' && question.type === 'select') {
                fieldName = question.name;
                label = question.label;
                elementHTML = `
                    <label class="block text-sm font-medium text-gray-700 mb-2">${label}</label>
                    <select name="${fieldName}" class="form-control w-full px-3 py-2 border rounded-md" required>
                        <option value="">Pilih Jawaban</option>
                        ${question.options.map(opt => `<option value="${opt}" ${fieldValue === opt ? 'selected' : ''}>${opt}</option>`).join('')}
                    </select>
                `;
            } else {
                label = question;
                elementHTML = `
                    <label class="block text-sm font-medium text-gray-700 mb-2">${label}</label>
                    <input type="text" name="${fieldName}" class="form-control w-full px-3 py-2 border rounded-md" value="${fieldValue.replace(/"/g, '&quot;')}" required>
                `;
            }

            const questionElement = document.createElement('div');
            questionElement.className = 'mb-4';
            questionElement.innerHTML = elementHTML;
            container.appendChild(questionElement);
        });
    }

    document.getElementById('status').addEventListener('change', function () {
        renderSoal(this.value);
    });

    window.addEventListener('DOMContentLoaded', function () {
        const status = @json($currentStatus);
        if (status && statusQuestions[status]) {
            renderSoal(status, initialValues);
        }
    });
</script>