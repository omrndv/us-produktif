<div class="p-4 sm:ml-64 mt-4 mb-5">
        <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
            Kelas Anda, <br>
            <?= session()->get('nama'); ?>
        </div>

        <div class="overflow-x-auto mt-6">
            <table class="w-full bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kelas</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Poin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <?php foreach ($siswaByKelas as $index => $siswa) : ?>
                        <tr class="<?= $index % 2 === 0 ? 'bg-gray-50 dark:bg-gray-900' : 'bg-white dark:bg-gray-800' ?>">
                            <td class="px-4 py-4 whitespace-nowrap"><?= $index + 1 ?></td>
                            <td class=""><?= $siswa['nama'] ?></td>
                            <td class="px-4 py-4 whitespace-nowrap"><?= $siswa['kelas'] ?></td>
                            <td class="px-4 py-4 whitespace-nowrap"><?= $siswa['poin'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>