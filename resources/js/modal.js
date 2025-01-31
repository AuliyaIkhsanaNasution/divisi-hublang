document.addEventListener("DOMContentLoaded", function () {
    // Cabang Modal
    const modalCabang = document.getElementById("modal");
    const openModalButtonCabang = document.getElementById("openModalButton");
    const editButtonsCabang = document.querySelectorAll("#openModalButtonEdit");
    const formCabang = document.getElementById("cabangForm");

    if (openModalButtonCabang) {
        openModalButtonCabang.addEventListener("click", () => {
            document.getElementById("nama_cabang").value = "";
            formCabang.action = route("cabang.store");
            document.getElementById("method_field").value = "POST";
            modalCabang.classList.remove("hidden");
        });
    }

    editButtonsCabang.forEach((button) => {
        button.addEventListener("click", function () {
            const namaCabang = this.getAttribute("data-nama-cabang");
            const idCabang = this.getAttribute("data-id");

            document.getElementById("nama_cabang").value = namaCabang;
            formCabang.action = `/cabang/${idCabang}`;
            document.getElementById("method_field").value = "PUT";
            modalCabang.classList.remove("hidden");
        });
    });

    const closeModalButtonsCabang = document.querySelectorAll(
        "#closeModalButton, #closeModalButton2"
    );
    closeModalButtonsCabang.forEach((button) => {
        button.addEventListener("click", () => {
            modalCabang.classList.add("hidden");
        });
    });

    // Pegawai Modal
    const modalPegawai = document.getElementById("modalPegawai");
    const openModalButtonPegawai = document.getElementById(
        "openModalButtonPegawai"
    );
    const editButtonsPegawai = document.querySelectorAll(
        "#openModalButtonEditPegawai"
    );
    const formPegawai = document.getElementById("pegawaiForm");

    if (openModalButtonPegawai) {
        openModalButtonPegawai.addEventListener("click", () => {
            document.getElementById("nama_pegawai").value = "";
            formPegawai.action = route("pegawai.store");
            document.getElementById("method_field").value = "POST";
            modalPegawai.classList.remove("hidden");
        });
    }

    editButtonsPegawai.forEach((button) => {
        button.addEventListener("click", function () {
            const namaPegawai = this.getAttribute("data-nama-pegawai");
            const idPegawai = this.getAttribute("data-id");

            document.getElementById("nama_pegawai").value = namaPegawai;
            formPegawai.action = `/pegawai/${idPegawai}`;
            document.getElementById("method_field").value = "PUT";
            modalPegawai.classList.remove("hidden");
        });
    });

    const closeModalButtonsPegawai = document.querySelectorAll(
        "#closeModalButtonPegawai, #closeModalButtonPegawai2"
    );
    closeModalButtonsPegawai.forEach((button) => {
        button.addEventListener("click", () => {
            modalPegawai.classList.add("hidden");
        });
    });
});
