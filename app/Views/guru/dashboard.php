<div class="mt-4 p-4 sm:ml-64">
    <?php if (session()->has('pesan_selamat_datang')): ?>
        <div class="pesan-selamat-datang bg-green-600 text-white rounded-md p-4 mt-14 mb-0 text-center">
            <?= session('pesan_selamat_datang') ?>
        </div>
    <?php endif; ?>

    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Halo,<br>
        <?= session()->get('nama'); ?>
    </div>
    <div class="text-xl font-semibold mt-2" style="color: gray;">
        <?= $tanggal ?> | <span id="clock"></span>
    </div>
    <div class="p-6 border-2 border-gray-600 rounded-lg dark:border-gray-700 mt-4 shadow">
        <div class="text-xl font-bold whitespace-nowrap dark:text-white">
            Jurnal Kegiatan Pembelajaran
        </div>
        <div class="text-large font-regular mt-1" style="color: gray;">
            Selamat datang di Jurnal Kelas, wahana eksplorasi dan pencatatan perjalanan pembelajaran siswa! Jurnal
            ini dirancang khusus untuk memberikan ruang kepada setiap siswa dalam mengekspresikan refleksi,
            pengalaman, dan pencapaian pribadi mereka selama proses belajar di kelas ini.
        </div>
        <hr class="h-px my-4 bg-gray-400 border-0 dark:bg-gray-700">
        <form method="post" action="<?= site_url('/post-jurnal'); ?>">
            <input type="hidden" name="waktu_input" value="<?= date('Y-m-d H:i:s') ?>">
            <div class="mb-6">
                <label for="nama_guru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Guru</label>
                <input type="text" id="nama_guru" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="<?= session()->get('nama'); ?>" readonly required />
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="mapel"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mapel</label>
                    <input type="text" id="mapel" name="mapel"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="<?= session()->get('mapel'); ?>" readonly required />
                </div>
                <div>
                    <label for="kelas"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <select id="kelas" name="kelas"
                        class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>Pilih Kelas</option>
                        <option value="XII RPL 1">XII RPL 1</option>
                        <option value="XII RPL 2">XII RPL 2</option>
                        <option value="XII RPL 3">XII RPL 3</option>
                        <option value="XII RPL 4">XII RPL 4</option>
                        <option value="XII RPL 5">XII RPL 5</option>
                    </select>
                </div>
                <div>
                    <label for="tanggal"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
            </div>

            <label for="materi_kegiatan"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materi/Kegiatan</label>
            <textarea id="materi_kegiatan" name="materi_kegiatan" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tambahkan informasi kegiatan mengajar pada hari ini.."></textarea>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Submit</button>
        </form>
    </div>

</div>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
        setTimeout(updateClock, 1000);
    }
    updateClock();
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.pesan-selamat-datang').hide();
        }, 3000);
    });
</script>