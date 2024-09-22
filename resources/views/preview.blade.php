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
        <h1 class="font-bold text-3xl text-center mb-8">Preview Data Pendaftar</h1>

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

        <div class="container mx-auto mt-10 p-6">
            <table class="table-auto w-full text-left text-sm">
                <tbody>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Nama:</th>
                        <td class="py-3 px-4">{{ $penerima->nama }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">NIK:</th>
                        <td class="py-3 px-4">{{ $penerima->nik }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">No KK:</th>
                        <td class="py-3 px-4">{{ $penerima->no_kk }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Usia:</th>
                        <td class="py-3 px-4">{{ $penerima->usia }} tahun</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Jenis Kelamin:</th>
                        <td class="py-3 px-4">{{ $penerima->gender }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Provinsi:</th>
                        <td class="py-3 px-4">{{ $penerima->provinsi }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Kota:</th>
                        <td class="py-3 px-4">{{ $penerima->kota }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Kecamatan:</th>
                        <td class="py-3 px-4">{{ $penerima->kecamatan }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Kelurahan:</th>
                        <td class="py-3 px-4">{{ $penerima->kelurahan }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Alamat:</th>
                        <td class="py-3 px-4">{{ $penerima->alamat }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">RT:</th>
                        <td class="py-3 px-4">{{ $penerima->rt }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">RW:</th>
                        <td class="py-3 px-4">{{ $penerima->rw }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Penghasilan Sebelum Pandemi:</th>
                        <td class="py-3 px-4">Rp{{ number_format($penerima->penghasilan_sebelum, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Penghasilan Sesudah Pandemi:</th>
                        <td class="py-3 px-4">Rp{{ number_format($penerima->penghasilan_sesudah, 2, ',', '.') }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-3 px-4 font-bold text-gray-700">Alasan:</th>
                        <td class="py-3 px-4">{{ $penerima->alasan }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('penerima.create') }}"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
            </div>
        </div>
    </div>
</body>
