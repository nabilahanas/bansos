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

                        <!-- Nama -->
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full">
                                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama
                                    Lengkap:</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                    class="shadow appearance-none border {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-300' }} rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                @if ($errors->has('nama'))
                                    <p class="text-red-500 text-xs italic">{{ $errors->first('nama') }}</p>
                                @endif
                            </div>

                            <!-- NIK -->
                            <div class="sm:col-span-3">
                                <label for="nik"
                                    class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
                                <div class="mt-2">
                                    <input type="text" name="nik" id="nik"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- No KK -->
                            <div class="sm:col-span-3">
                                <label for="no_kk" class="block text-sm font-medium leading-6 text-gray-900">No.
                                    KK</label>
                                <div class="mt-2">
                                    <input type="text" name="no_kk" id="no_kk" autocomplete="no_kk"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- Foto KTP -->
                            <div class="col-span-full">
                                <label for="foto_ktp" class="block text-sm font-medium leading-6 text-gray-900">Foto
                                    KTP</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="foto_ktp" type="file" class="sr-only"
                                                    accept=".jpg,.jpeg,.png,.bmp">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">JPG/JPEG/PNG/BMP up to 2MB</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Foto KK -->
                            <div class="col-span-full">
                                <label for="foto_kk" class="block text-sm font-medium leading-6 text-gray-900">Foto
                                    KK</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="foto_kk" type="file" class="sr-only"
                                                    accept=".jpg,.jpeg,.png,.bmp">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">JPG/JPEG/PNG/BMP up to 2MB</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Usia -->
                            <div class="sm:col-span-3">
                                <label for="usia"
                                    class="block text-sm font-medium leading-6 text-gray-900">Usia</label>
                                <div class="mt-2">
                                    <input type="text" name="usia" id="usia"
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
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
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
                                        <option value="">Pilih Kota/Kabupaten</option>
                                        @foreach ($kota as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Kecamatan -->
                            <div class="sm:col-span-3 sm:col-start-1">
                                <label for="kecamatan"
                                    class="block text-sm font-medium leading-6 text-gray-900">Kecamatan</label>
                                <div class="mt-2">
                                    <input type="text" name="kecamatan" id="kecamatan"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- Kelurahan -->
                            <div class="sm:col-span-3">
                                <label for="kelurahan"
                                    class="block text-sm font-medium leading-6 text-gray-900">Kelurahan</label>
                                <div class="mt-2">
                                    <input type="text" name="kelurahan" id="kelurahan"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-span-full">
                                <label for="alamat"
                                    class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                                <div class="mt-2">
                                    <input type="text" name="alamat" id="alamat" autocomplete="alamat"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- RT -->
                            <div class="sm:col-span-3">
                                <label for="rt"
                                    class="block text-sm font-medium leading-6 text-gray-900">RT</label>
                                <div class="mt-2">
                                    <input type="text" name="rt" id="rt"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>

                            <!-- RW -->
                            <div class="sm:col-span-3">
                                <label for="rw"
                                    class="block text-sm font-medium leading-6 text-gray-900">RW</label>
                                <div class="mt-2">
                                    <input type="text" name="rw" id="rw"
                                        class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <!-- Penghasilan Sebelum Pandemi -->
                        <div class="col-span-full">
                            <label for="penghasilan_sebelum"
                                class="block text-sm font-medium leading-6 text-gray-900">Penghasilan Sebelum
                                Pandemi</label>
                            <div class="mt-2">
                                <input type="text" name="penghasilan_sebelum" id="penghasilan_sebelum"
                                    autocomplete="alamat"
                                    class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
                            </div>
                        </div>

                        <!-- Penghasilan Setelah Pandemi -->
                        <div class="col-span-full">
                            <label for="penghasilan_sesudah"
                                class="block text-sm font-medium leading-6 text-gray-900">Penghasilan Sesudah
                                Pandemi</label>
                            <div class="mt-2">
                                <input type="text" name="penghasilan_sesudah" id="penghasilan_sesudah"
                                    autocomplete="alamat"
                                    class="block w-full py-2 px-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    required>
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
                                    <option></option>
                                    <option>Kehilangan pekerjaan</option>
                                    <option>Kepala keluarga</option>
                                    <option>Tergolong fakir/miskin</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
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
                                            {{ old('comments') ? 'checked' : '' }} required>
                                    </div>
                                    <div class="text-sm leading-6">
                                        <p class="text-gray-900">Saya menyatakan bahwa data yang diisikan adalah benar
                                            dan siap mempertanggungjawabkan apabila ditemukan ketidaksesuaian dalam data
                                            tersebut.</p>
                                    </div>
                                </div>
                                @if ($errors->has('comments'))
                                    <p class="text-red-500 text-xs italic">{{ $errors->first('comments') }}</p>
                                @endif
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

</html>
