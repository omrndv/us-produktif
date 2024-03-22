<?php
usort($jurnals, function ($a, $b) {
    return strtotime($b['waktu_input']) - strtotime($a['waktu_input']);
});
?>

<div class="p-4 sm:ml-64 mt-4 mb-5">
    <?php if (session()->has('pesan_selamat_datang')): ?>
        <div class="pesan-selamat-datang bg-green-600 text-white rounded-md p-4 mt-14 mb-0 text-center">
            <?= session('pesan_selamat_datang') ?>
        </div>
    <?php endif; ?>

    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Daftar<br>
        Jurnal Harian
    </div>
    <div class="text-xl font-semibold mt-2" style="color: gray;">
        <p>Klik jurnal harian untuk melanjutkan ke halaman absensi.</p>
    </div>

    <div class="overflow-x-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari">
                </div>

                <input type="date" id="tanggal" name="tanggal"
                    class="px-2 py-1 border border-gray-300 rounded-md ml-auto" placeholder="dd/mm/yyyy">

            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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
                        <th scope="col">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Isi Jurnal
                        </th>
                    </tr>
                </thead>
                <tbody id="table-data">
                    <?php foreach ($jurnals as $jurnal): ?>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $waktu_input = strtotime($jurnal['waktu_input']);
                        $waktu_sekarang = time();
                        $diferensiwaktu = $waktu_sekarang - $waktu_input;
                        $is_disabled = $diferensiwaktu > (20000 * 60);
                        $status = $is_disabled ? 'Nonaktif' : 'Aktif';
                        ?>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                <a href="<?= ($is_disabled ? '#' : site_url('absen-harian/' . $jurnal['id_dafjur'])) ?>"
                                    style="color:black"
                                    class="
                        <?= ($is_disabled ? 'opacity-50 cursor-not-allowed' : 'font-bold text-black-900 dark:text-blue-500 hover:underline') ?>">
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
                                <?= date('d-m-Y', strtotime($jurnal['tanggal'])) ?>
                            </td>
                            <td class="px-4">
                                <?php if ($is_disabled): ?>
                                    <span class="inline-block w-3 h-3 rounded-full bg-red-500"></span>
                                <?php else: ?>
                                    <span class="inline-block w-3 h-3 rounded-full bg-green-500"></span>
                                <?php endif; ?>
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
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('table-search-users');
            const rows = document.querySelectorAll('#table-data tr');
            const tanggalInput = document.getElementById('tanggal');
            const dateFormatOptions = { day: '2-digit', month: '2-digit', year: 'numeric' };

            tanggalInput.addEventListener('change', function (event) {
                const selectedDate = new Date(event.target.value);
                const selectedDateString = formatDate(selectedDate);

                rows.forEach(row => {
                    const rowDate = row.querySelector('td:nth-child(4)').textContent.trim();
                    if (rowDate === selectedDateString) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            searchInput.addEventListener('input', function (event) {
                const searchText = event.target.value.toLowerCase();
                rows.forEach(row => {
                    const teacherName = row.querySelector('td:nth-child(3)').textContent.toLowerCase().trim();
                    const subject = row.querySelector('td:nth-child(1)').textContent.toLowerCase().trim();

                    if (teacherName.includes(searchText) || subject.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            function formatDate(date) {
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                return `${day}-${month}-${year}`;
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.pesan-selamat-datang').hide();
            }, 3000);
        });
    </script>
</div>