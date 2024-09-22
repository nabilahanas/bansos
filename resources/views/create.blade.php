<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bansos</title>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 p-4">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-3xl text-center mb-8">Pendaftaran Penerima Bantuan Sosial</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">Ada masalah dengan input Anda.</span>
                <ul class="mt-2 text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-6">
            <form method="POST" action="{{ route('penerima.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive
                            mail.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <!-- Nama -->
                            <div class="col-span-full">
                                <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                    Lengkap</label>
                                <div class="mt-2">
                                    <input type="text" id="nama" name="nama"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                    @if ($errors->has('nama'))
                                        <p class="text-red-500 text-xs italic">{{ $errors->first('nama') }}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- NIK -->
                            <div class="sm:col-span-3">
                                <label for="nik"
                                    class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
                                <div class="mt-2">
                                    <input type="number" name="nik" id="nik"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- No KK -->
                            <div class="sm:col-span-3">
                                <label for="no_kk" class="block text-sm font-medium leading-6 text-gray-900">No.
                                    KK</label>
                                <div class="mt-2">
                                    <input type="number" name="no_kk" id="no_kk"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            {{-- <!-- Foto KTP -->
                            <div class="sm:col-span-3">
                                <label for="foto_ktp" class="block text-sm font-medium leading-6 text-gray-900">Foto
                                    KTP</label>
                                <div class="mt-2">
                                    <input type="file" id="foto_ktp" name="foto_ktp" accept=".jpg,.jpeg,.png,.bmp"
                                        required
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <!-- Foto KK -->
                            <div class="sm:col-span-3">
                                <label for="foto_kk" class="block text-sm font-medium leading-6 text-gray-900">Foto
                                    KK</label>
                                <div class="mt-2">
                                    <input type="file" id="foto_kk" name="foto_kk" accept=".jpg,.jpeg,.png,.bmp"
                                        required
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div> --}}

                            <!-- Usia -->
                            <div class="sm:col-span-3">
                                <label for="usia"
                                    class="block text-sm font-medium leading-6 text-gray-900">Usia</label>
                                <div class="mt-2">
                                    <input type="number" name="usia" id="usia" min="25"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                    <p class="text-red-500 text-xs italic">Wajib berusia 25 tahun ke atas!</p>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="sm:col-span-3">
                                <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Jenis
                                    Kelamin</label>
                                <div class="mt-2">
                                    <select id="gender" name="gender"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Provinsi -->
                            <div class="sm:col-span-3">
                                <label for="provinsi"
                                    class="block text-sm font-medium leading-6 text-gray-900">Provinsi</label>
                                <div class="mt-2">
                                    <select name="provinsi" id="provinsi"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        required>
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Kota -->
                            <div class="sm:col-span-3">
                                <label for="kota"
                                    class="block text-sm font-medium leading-6 text-gray-900">Kota/Kabupaten</label>
                                <div class="mt-2">
                                    <select name="kota" id="kota"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        required>
                                        <option value="">Pilih Kota</option>
                                        @if (!empty($kota))
                                            @foreach ($kota as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <!-- Kecamatan -->
                            <div class="sm:col-span-3 sm:col-start-1">
                                <label for="kecamatan"
                                    class="block text-sm font-medium leading-6 text-gray-900">Kecamatan</label>
                                <div class="mt-2">
                                    <select name="kecamatan" id="kecamatan"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        required>
                                        <option value="">Pilih Kecamatan</option>
                                        @if (!empty($kecamatan))
                                            @foreach ($kecamatan as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <!-- Kelurahan -->
                            <div class="sm:col-span-3">
                                <label for="kelurahan"
                                    class="block text-sm font-medium leading-6 text-gray-900">Kelurahan</label>
                                <div class="mt-2">
                                    <select name="kelurahan" id="kelurahan"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                                        required>
                                        <option value="">Pilih Kelurahan</option>
                                        @if (!empty($kelurahan))
                                            @foreach ($kelurahan as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-span-full">
                                <label for="alamat"
                                    class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                                <div class="mt-2">
                                    <input type="text" name="alamat" id="alamat"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- RT -->
                            <div class="sm:col-span-3">
                                <label for="rt"
                                    class="block text-sm font-medium leading-6 text-gray-900">RT</label>
                                <div class="mt-2">
                                    <input type="number" name="rt" id="rt" min="0"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- RW -->
                            <div class="sm:col-span-3">
                                <label for="rw"
                                    class="block text-sm font-medium leading-6 text-gray-900">RW</label>
                                <div class="mt-2">
                                    <input type="number" name="rw" id="rw" min="0"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- Penghasilan Sebelum Pandemi -->
                        <div class="sm:col-span-3"">
                            <label for="penghasilan_sebelum"
                                class="block text-sm font-medium leading-6 text-gray-900">Penghasilan Sebelum
                                Pandemi</label>
                            <div class="mt-2">
                                <input type="number" name="penghasilan_sebelum" id="penghasilan_sebelum"
                                    min="0"
                                    class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
                                <p class="text-gray-500 text-xs">Contoh: 1000000</p>
                            </div>
                        </div>

                        <!-- Penghasilan Setelah Pandemi -->
                        <div class="sm:col-span-3">
                            <label for="penghasilan_sesudah"
                                class="block text-sm font-medium leading-6 text-gray-900">Penghasilan Sesudah
                                Pandemi</label>
                            <div class="mt-2">
                                <input type="number" name="penghasilan_sesudah" id="penghasilan_sesudah"
                                    min="0"
                                    class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
                                <p class="text-gray-500 text-xs">Contoh: 1000000</p>

                            </div>
                        </div>

                        <!-- Alasan -->
                        <div class="col-span-full">
                            <label for="alasan"
                                class="block text-sm font-medium leading-6 text-gray-900">Alasan</label>
                            <div class="mt-2">
                                <select id="alasan" name="alasan"
                                    class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
                                    <option value="">Pilih Alasan</option>
                                    <option value="Kehilangan pekerjaan">Kehilangan pekerjaan</option>
                                    <option value="Kepala keluarga">Kepala keluarga</option>
                                    <option value="Tergolong fakir/miskin">Tergolong fakir/miskin</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-span-full" id="input-alasan" style="display: none;">
                            <label for="alasan_lain" class="block text-sm font-medium leading-6 text-gray-900">Alasan
                                Lainnya</label>
                            <input type="text" id="alasan" name="alasan_lain"
                                class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 space-y-10">
                        <fieldset>
                            <div class="mt-6 space-y-6">
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="comments" name="comments" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                            required>
                                    </div>
                                    <div class="text-sm leading-6">
                                        <p class="text-gray-900">Saya menyatakan bahwa data yang diisikan adalah benar
                                            dan siap mempertanggungjawabkan apabila ditemukan ketidaksesuaian dalam data
                                            tersebut.</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>


                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    document.getElementById('provinsi').addEventListener('change', function() {
        var provinceId = this.value;

        fetch(`/get-kota/${provinceId}`)
            .then(response => response.json())
            .then(kota => {
                var kotaSelect = document.getElementById('kota');
                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                kota.forEach(function(kotaItem) {
                    kotaSelect.innerHTML +=
                        `<option value="${kotaItem.id}">${kotaItem.name}</option>`;
                });
                kotaSelect.disabled = false;
            });
    });

    document.getElementById('kota').addEventListener('change', function() {
        var cityId = this.value;

        fetch(`/get-kecamatan/${cityId}`)
            .then(response => response.json())
            .then(kecamatan => {
                var kecamatanSelect = document.getElementById('kecamatan');
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kecamatan.forEach(function(kecamatanItem) {
                    kecamatanSelect.innerHTML +=
                        `<option value="${kecamatanItem.id}">${kecamatanItem.name}</option>`;
                });
                kecamatanSelect.disabled = false;
            });
    });

    document.getElementById('kecamatan').addEventListener('change', function() {
        var regencyId = this.value;

        fetch(`/get-kelurahan/${regencyId}`)
            .then(response => response.json())
            .then(kelurahan => {
                var kelurahanSelect = document.getElementById('kelurahan');
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                kelurahan.forEach(function(kelurahanItem) {
                    kelurahanSelect.innerHTML +=
                        `<option value="${kelurahanItem.id}">${kelurahanItem.name}</option>`;
                });
                kelurahanSelect.disabled = false;
            })
    });

    document.getElementById('alasan').addEventListener('change', function() {
        var inputAlasan = document.getElementById('input-alasan');
        var alasanLainInput = document.getElementById('alasan-lain');

        if (this.value === 'Lainnya') {
            inputAlasan.style.display = 'block';
            alasanLainInput.setAttribute('required', 'required');
        } else {
            inputAlasan.style.display = 'none';
            alasanLainInput.removeAttribute('required');
            alasanLainInput.value = '';
        }
    });
</script>

</html>
