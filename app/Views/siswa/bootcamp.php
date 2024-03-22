<div class="p-4 sm:ml-64 mt-4 mb-5">
    <style>
        tr:hover td {
            background-color: #f0f0f0;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="font-bold mt-14 text-3xl">Daftar <br> Bootcamp</h1>
            <div class="text-lg font-semibold mt-2" style="color: gray;">
                <p>Berikut ini adalah siswa-siswa yang mengikuti bootcamp pembinaan
                    karakter</p>
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-6">
            <thead class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-800">
                <tr>
                    <th scope="col" class="px-3 py-3 text-center">No</th>
                    <th scope="col" class="px-4 py-3">Nama</th>
                    <th scope="col" class="px-4 py-3"></th>
                    <th scope="col" class="px-6 py-3">Kelas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($students as $student) {
                    echo '<tr class="bg-white text-gray-800 dark:text-gray-800 dark:bg-gray-800 dark:border-gray-900 hover:bg-gray-50 dark:hover:bg-gray-600">';
                    echo '<td class="px-3 py-4 text-center">' . $no++ . '</td>';
                    echo '<td class="px-4 py-4">' . $student['nama'] . '</td>';
                    echo '<td class="px-4 py-4">' . '</td>';
                    echo '<td class="px-6 py-4">' . $student['kelas'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>