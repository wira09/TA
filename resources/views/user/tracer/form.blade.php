<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control" required>
        <option value="">Pilih Status</option>
        <option value="bekerja" {{ old('status', $tracer->status ?? '') == 'bekerja' ? 'selected' : '' }}>Bekerja
        </option>
        <option value="wiraswasta" {{ old('status', $tracer->status ?? '') == 'wiraswasta' ? 'selected' : '' }}>
            Wiraswasta</option>
        <option value="melanjutkan" {{ old('status', $tracer->status ?? '') == 'melanjutkan' ? 'selected' : '' }}>
            Melanjutkan Pendidikan</option>
        <option value="tidak bekerja" {{ old('status', $tracer->status ?? '') == 'tidak bekerja' ? 'selected' : '' }}>
            Tidak Bekerja</option>
    </select>
</div>

<div class="mb-3">
    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
        value="{{ old('tanggal_mulai', $tracer->tanggal_mulai ?? '') }}" required>
</div>

<div id="soal-form" class="space-y-4"></div>

<script>
    const statusQuestions = {
        'bekerja': [
            'Berapa lama anda mendapatkan pekerjaan',
            'Berapa rata-rata pendapatan per bulan anda (Take Home Pay)',
            'Lokasi Tempat Anda Bekerja (Provinsi)',
            'Lokasi Tempat Anda Bekerja (Kota / Kabupaten)',
            'Jenis Perusahaan tempat anda bekerja',
            'Nama Perusahaan tempat anda bekerja',
            'Kategori perusahaan tempat anda bekerja',
            'Informasi yang anda dapatkan untuk mencari pekerjaan'
        ],
        'wiraswasta': [
            'Apakah jabatan/posisi anda ketika Berwirausaha',
            'Nama Usaha anda',
            'Pendapatan per bulan anda',
            'Bidang Usaha',
            'Berapa lama anda memulai usaha'
        ],
        'melanjutkan': [
            'Jenjang melanjutkan',
            'Nama Perguruan Tinggi',
            'Nama Program Studi',
            'Tanggal Bulan Tahun Masuk',
            'Sumber Biaya'
        ],
        'tidak bekerja': [
            'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?',
            'Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?',
            'Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?'
        ]
    };

    function renderSoal(status, values = {}) {
        const container = document.getElementById('soal-form');
        container.innerHTML = '';

        if (!status || !statusQuestions[status]) return;

        statusQuestions[status].forEach((question, index) => {
            const questionNumber = index + 1;
            const fieldName = `soal_${questionNumber}`;
            const fieldValue = values[fieldName] || '';

            const questionElement = document.createElement('div');
            questionElement.className = 'mb-4';

            questionElement.innerHTML = `
                <label class="block text-sm font-medium text-gray-700 mb-2">${question}</label>
                <input type="text"
                       name="${fieldName}"
                       class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="${fieldValue.replace(/"/g, '&quot;')}"
                       required>
            `;

            container.appendChild(questionElement);
        });
    }

    document.getElementById('status').addEventListener('change', function() {
        renderSoal(this.value);
    });

    // Initialize form for edit or create
    @php
        $currentStatus = old('status', $tracer->status ?? '');
        $initialValues = [];
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

    window.addEventListener('DOMContentLoaded', function() {
        const status = @json($currentStatus);
        const initialValues = @json($initialValues);
        if (status && statusQuestions[status]) {
            renderSoal(status, initialValues);
        }
    });
</script>
