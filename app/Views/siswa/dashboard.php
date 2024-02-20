<div class="p-4 sm:ml-64 mt-4 mb-5">
    <?php if (session()->has('pesan_selamat_datang')): ?>
        <div class="bg-green-600 text-white rounded-md p-4 mt-14 mb-0 text-center">
            <?= session('pesan_selamat_datang') ?>
        </div>
    <?php endif; ?>

    <div class="text-3xl font-bold whitespace-nowrap dark:text-white mt-14">
        Halo,<br>
        <?= session()->get('nama'); ?>
    </div>
    <div class="text-xl font-semibold mt-2" style="color: gray;">
        <?= $tanggal ?> | <span id="clock"></span>
        <!-- <p>Pendidikan Agama Islam</p>  -->
    </div>
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-6">
        <form>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="first_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="<?= session()->get('nama') ?>" disabled>
                </div>
                <div>
                    <label for="last_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Absen</label>
                    <select
                        class="select border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option disabled selected>Masukkan Kategori Absen</option>
                        <option>Han Solo</option>
                        <option>Greedo</option>
                    </select>
                </div>
            </div>
            <div class="mb-6">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan &
                    Alasan</label>
                <textarea
                    class="textarea border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                    placeholder="Berikan alasan dan keterangan yang lengkap" style="height: 150px"></textarea>
            </div>
            <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                        required>
                </div>
                <label for="remember" class="ms-2 text-sm font-regular text-gray-900 dark:text-gray-300">Saya
                    menyatakan dengan
                    ini <a class="text-blue-600 hover:underline dark:text-blue-500"> bahwa saya mengisi
                        form ini dengan sejujur-jujurnya.</a>.</label>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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