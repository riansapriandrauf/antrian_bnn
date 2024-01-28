<script>
    function berhasil_login() {
        swal.fire({
            title: "Selamat Datang!",
            text: "Disistem Informasi Boking Antrian BNN - Kolaka",
            icon: "success",
            showConfirmButton: false,
        });
        setTimeout(
            function() {
                window.location = "<?= $url ?>";
            },
            1500); // waktu tunggu atau delay
    }
    function berhasil_regis() {
        swal.fire({
            title: "Berhasil Buat Akun!",
            text: "Silahkan Login",
            icon: "success",
            showConfirmButton: false,
        });
        setTimeout(
            function() {
                window.location = "<?= $url ?>/login";
            },
            1500); // waktu tunggu atau delay
    }

    function pw_salah() {
        swal.fire({
            title: "Password Salah!",
            text: "Maaf password yang anda masukkan salah!!!",
            icon: "error",
            button: true,
        });
    }

    function no_user() {
        swal.fire({
            title: "Username tidak terdaftar!",
            text: "Maaf username yang anda masukkan belum terdaftar!!!",
            icon: "error",
            button: true,
        });
    }

    function berhasil() {
        swal.fire({
            title: "Berhasil!",
            text: "Menyimpan data",
            icon: "success",
            button: true,
        });

    }

    function gagal() {
        swal.fire({
            title: "Gagal Menyimpan Data!",
            text: "Mohon periksa data anda",
            icon: "error",
            button: true,
        });
    }

    function double() {
        swal.fire({
            title: "Maaf Data Double!",
            text: "Maaf anda tidak dapat menginput data double",
            icon: "info",
            button: true,
        });
    }

    function done_antrian() {
        swal.fire({
            title: "Antrian Selesai!",
            text: "Berhasil menyimpan data",
            icon: "success",
            button: true,
        });

    }

    function double_antrian() {
        swal.fire({
            title: "Maaf Double Antrian",
            text: "Anda tidak dapat memboking lebih dari 1 antrian di tanggal yang sama",
            icon: "info",
            button: true,
        });
    }


    // KEMBALI KE PAGE SEBELUMNYA
    function goBack() {
        window.history.back();
    }

    function no_data() {
        swal.fire({
            title: "Data Tidak Ditemukan",
            icon: "error",
            button: true,
        });
        setTimeout(
            function() {
                goBack();
            },
            1500); // waktu tunggu atau delay
    }
</script>