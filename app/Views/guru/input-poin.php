<!-- guru/input-poin.php -->

<div class="p-4 sm:ml-64 mt-4 mb-5">
    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Input <br>
        Poin Siswa
    </div>
    <div class="container mx-auto py-6">
        <div class="flex justify-between items-center mb-4">
            <input id="searchInput" type="text" placeholder="Cari siswa..."
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <!-- guru/input-poin.php -->

        <div class="overflow-x-auto">
            <table id="siswaTable" class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Kelas</th>
                        <th class="px-4 py-2">Poin</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php foreach ($siswa as $index => $data): ?>
                        <tr>
                            <td class="border px-4 py-2">
                                <?= $index + 1 ?>
                            </td>
                            <td class="border px-4 py-2">
                                <?= $data['nama'] ?>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <?= $data['kelas'] ?>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <?= $data['poin'] ?>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <a href="/detailsiswa?nama=<?= $data['nama'] ?>&kelas=<?= $data['kelas'] ?>&poin=<?= $data['poin'] ?>"><button
                                            class=" bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4
                                rounded">Update</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        let searchValue = this.value.toLowerCase();
        let tableRows = document.querySelectorAll('#siswaTable tbody tr');

        tableRows.forEach(function (row) {
            let nama = row.children[1].textContent.toLowerCase();
            let kelas = row.children[2].textContent.toLowerCase();

            if (nama.includes(searchValue) || kelas.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>