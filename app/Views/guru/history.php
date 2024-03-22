<div class="mt-4 p-4 sm:ml-64">
    <?php if (session()->has('pesan_selamat_datang')): ?>
        <div class="bg-green-600 text-white rounded-md p-4 mt-14 mb-0 text-center">
            <?= session('pesan_selamat_datang') ?>
        </div>
    <?php endif; ?>

    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Halo,<br>
        <?= session()->get('nama'); ?>
    </div>
    <div class="text-xl font-semibold mt-3" style="color: gray; margin-bottom: 3%;">
        Berikut merupakan daftar jurnal anda.
    </div>

    <div class="w-full flex justify-between items-center mb-4">
        <div></div>
        <button type="button" id="deleteSelected" class="bg-red-500 text-white px-4 py-2 rounded-md">Hapus Data
            Terpilih</button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pelajaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Guru
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Isi Jurnal
                    </th>
                </tr>
            </thead>
            <tbody id="table-data"
                class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <?php foreach ($jurnals as $jurnal): ?>
                    <tr>
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-<?= $jurnal['id_dafjur'] ?>" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    value="<?= $jurnal['id_dafjur'] ?>">
                                <label for="checkbox-table-search-<?= $jurnal['id_dafjur'] ?>"
                                    class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="<?= site_url('detail-absen/' . $jurnal['id_dafjur']) ?>" style="color:black"
                                class="font-bold text-black-900 dark:text-blue-500 hover:underline">
                                <?= $jurnal['mapel'] ?>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <?= $jurnal['kelas'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $jurnal['nama'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $jurnal['tanggal'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $jurnal['materi_kegiatan'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Mengonfirmasi sebelum menghapus
    document.getElementById('deleteSelected').addEventListener('click', function () {
        var selectedIds = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function (checkbox) {
            selectedIds.push(checkbox.value);
        });

        if (selectedIds.length === 0) {
            alert('Pilih setidaknya satu data untuk dihapus.');
            return;
        }

        if (confirm('Anda yakin ingin menghapus data terpilih?')) {
            var form = document.createElement('form');
            form.action = '<?= site_url('/hapusjurnalterpilih') ?>';
            form.method = 'POST';

            selectedIds.forEach(function (id) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedIds[]';
                input.value = id;
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        }
    });

    // Checkbox All
    document.getElementById('checkbox-all-search').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = event.target.checked;
        });
    });
</script>