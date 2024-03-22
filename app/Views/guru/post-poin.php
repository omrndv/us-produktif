<div class="p-4 sm:ml-64 mt-4 mb-5">
    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Detail <br>
        Pribadi Siswa
    </div>
    <div class="container mx-auto py-6">
        <div class="overflow-x-auto">
            <form action="/update-poin" method="post">
                <input type="hidden" name="nama" value="<?= $nama ?>">
                <input type="hidden" name="kelas" value="<?= $kelas ?>">
                <input type="hidden" name="poin" value="<?= $poin ?>">
                <div class="mb-4">
                    <div class="flex flex-col mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama :</label>
                        <input type="text" value="<?= $nama ?>" name="nama"
                            class="px-4 mt-2 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            readonly>
                    </div>
                    <div class="flex flex-col mb-2 mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelas :</label>
                        <input type="text" value="<?= $kelas ?>" name="kelas"
                            class="px-4 mt-2 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            readonly>
                    </div>
                    <div class="flex flex-col mb-2 mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Poin :</label>
                        <input type="text" value="<?= $poin ?>"
                            class="px-4 mt-2 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            readonly>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Pelanggaran:</label>
                    <div class="mt-3">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="poin[]"
                                value="5">
                            <span class="ml-2">Tidak Menggunakan Sepatu Sesuai Aturan</span>
                        </label>
                    </div>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="poin[]"
                                value="8">
                            <span class="ml-2">Terlambat Masuk</span>
                        </label>
                    </div>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="poin[]"
                                value="5">
                            <span class="ml-2">Rambut Panjang, Kuku Panjang</span>
                        </label>
                    </div>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="poin[]"
                                value="10">
                            <span class="ml-2">Tidak Berseragam Lengkap</span>
                        </label>
                    </div>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="poin[]"
                                value="10">
                            <span class="ml-2">Berkata Kasar saat Jam Pelajaran</span>
                        </label>
                    </div>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" name="poin[]"
                                value="15">
                            <span class="ml-2">Meninggalkan Kelas tanpa Izin</span>
                        </label>
                    </div>
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
    const errorMessage = null; // Menghilangkan session('error')
    const successMessage = <?= json_encode($successMessage) ?>; // Menggunakan variabel $successMessage dari PHP

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: successMessage
        }).then(() => {
            location.reload();
        });
    }
</script>
