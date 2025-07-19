<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- NIM -->
        <div class="mt-4">
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')"
                required autocomplete="nim" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- Additional Alumni Fields -->
        <div class="mt-4">
            <x-input-label for="angkatan" :value="__('Angkatan')" />
            <x-text-input id="angkatan" class="block mt-1 w-full" type="text" name="angkatan" :value="old('angkatan')"
                required />
            <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
        </div>

        <!-- Tahun Lulus -->
        <div class="mt-4">
            <x-input-label for="tahun_lulus" :value="__('Tahun Lulus')" />
            <x-text-input id="tahun_lulus" class="block mt-1 w-full" type="text" name="tahun_lulus"
                :value="old('tahun_lulus')" required />
            <x-input-error :messages="$errors->get('tahun_lulus')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="program_studi" :value="__('Program Studi')" />
            <select id="program_studi" name="program_studi" class="block mt-1 w-full" required>
                <option value="">-- Pilih Program Studi --</option>
                <option value="DIII - Akutansi" {{ old('program_studi') == 'DIII - DIII - Akutansi' ? 'selected' : '' }}>DIII - DIII - Akutansi</option>
                <option value="DIII - Teknik Mesin" {{ old('program_studi') == 'DIII - Teknik Mesin' ? 'selected' : '' }}>DIII - Teknik Mesin</option>
                <option value="DIII - Teknik Komputer" {{ old('program_studi') == 'DIII - Teknik Komputer' ? 'selected' : '' }}>DIII - Teknik Komputer</option>
                <option value="DIII - Teknik Elerektronika" {{ old('program_studi') == 'DIII - Teknik Elerektronika' ? 'selected' : '' }}>DIII - Teknik Elerektronika</option>
                <option value="DIII - Mekanik Otomotif" {{ old('program_studi') == 'DIII - Mekanik Otomotif' ? 'selected' : '' }}>DIII - Mekanik Otomotif</option>
                <option value="DIII - Alat Berat" {{ old('program_studi') == 'DIII - Alat Berat' ? 'selected' : '' }}>DIII - Alat Berat</option>
                <option value="DIII - Teknik Kimia" {{ old('program_studi') == 'DIII - Teknik Kimia' ? 'selected' : '' }}>DIII - Teknik Kimia(industri)</option>
                <option value="DIII - Rekam Medik & Informasi Kesehatan" {{ old('program_studi') == 'DIII - Rekam Medik & Informasi Kesehatan' ? 'selected' : '' }}>DIII - Rekam Medik & Informasi Kesehatan</option>
                <option value="DIV - Teknik Informatika" {{ old('program_studi') == 'DIV - Teknik Informatika' ? 'selected' : '' }}>DIV - Teknik Informatika</option>
                <option value="DIV - Mekanik Industri Dan Desain" {{ old('program_studi') == 'DIV - Mekanik Industri Dan Desain' ? 'selected' : '' }}>DIV - Mekanik Industri Dan Desain</option>
                <option value="DIV - Mekatronika" {{ old('program_studi') == 'DIV - Mekatronika' ? 'selected' : '' }}>DIV - Mekatronika</option>
                <option value="DIV - Komputer Akutansi" {{ old('program_studi') == 'DIV - Komputer Akutansi' ? 'selected' : '' }}>DIV - Komputer Akutansi</option>
                <option value="DIV - Teknik Otomasi" {{ old('program_studi') == 'DIV - Teknik Otomasi' ? 'selected' : '' }}>DIV - Teknik Otomasi</option>
                <option value="DIV - Kontruksi Bangunan" {{ old('program_studi') == 'DIV - Kontruksi Bangunan' ? 'selected' : '' }}>DIV - Kontruksi Bangunan</option>
            </select>
            <x-input-error :messages="$errors->get('program_studi')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="no_hp" :value="__('No Hp')" />
            <x-text-input id="no_hp" class="block mt-1 w-full" type="number" name="no_hp" :value="old('no_hp')"
                required />
            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')"
                required />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        {{-- jenis kelamin --}}
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('jenis_kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" pattern="\d*" title="Password harus berupa angka" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" pattern="\d*"
                title="Password harus berupa angka" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
