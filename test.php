<?php
var_dump($_POST);
?>

<div class="card card-accent-info border-info" id="section-card-2">
    <div class="card-header bg-info">
        <h4 class="card-title mb-0 text-white">
            <span class="font-weight-bold">BAHAGIAN B: PENGURUSAN PROGRAM NILAI</span>
        </h4>
    </div><!--card-header-->
    <form method="post" action="test.php" class="form-horizontal">
    <input type="hidden" name="_token" value="W1IavZun74QQT2eXnlcps4kVUBL47DlEKkH6XC4m">
    <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">Bahagian ini bertujuan untuk mendapatkan maklumat mengenai bilangan program nilai yang telah dilaksanakan dan maklumat peserta yang menghadiri program-program nilai sepanjang tempoh tahun yang diaudit.
</h6>
                                        <div class="card card-accent-success border-success" id="question-card-92">
    <div class="card-header bg-success" id="question-card-header-92">
        <h4 class="card-title mb-0">
            <div class="row">
                <div class="col-md">
                                            1. Jumlah Program Nilai Yang Telah Dilaksanakan
                    
                                    </div>
                <div class="col-md-2">
                    <div class="card-header-actions text-capitalize">
                                            </div>
                </div>
            </div>
        </h4>

    </div><!--card-header-->
    <div class="card-body">
                            <div class="table-responsive">
    <table class="table table-bordered mb-1">
        <thead>
        <tr class="text-uppercase">
            <th class="align-middle" rowspan="3">BIL.</th>
            <th class="align-middle" rowspan="3">Program/Kursus/Ceramah</th>
            <th class="align-middle" rowspan="3">BIL. JAM</th>
            <th class="align-middle" rowspan="3">KATEGORI</th>
            <th class="align-middle" rowspan="3">BIDANG FOKUS</th>
            <th class="align-middle" rowspan="3">PESERTA</th>
            <th class="align-middle text-center" colspan="6">KUMPULAN JAWATAN</th>
            <th class="align-middle" rowspan="3">HAPUS</th>
        </tr>
        <tr class="text-center">
            <td colspan="2">PENGURUSAN TERTINGGI</td>
            <td colspan="2">PENGURUSAN DAN PROFESIONAL</td>
            <td colspan="2">PELAKSANA</td>
        </tr>
        <tr class="text-center">
            <td>L</td>
            <td>P</td>
            <td>L</td>
            <td>P</td>
            <td>L</td>
            <td>P</td>
        </tr>
        </thead>
        <tbody id="tbody-question-92">
                                                
                        <tr id="record-0">
                            <td class="row-index align-middle"><span>1</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][0][0]" value="TAKILIMAT INTEGRITI , NILAI - NILAI KEROHANIAN DAN KEKELUARGAAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][0][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][0][2][]" class="custom-control-input" id="category-penerapan-0" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-0">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][0][2][]" class="custom-control-input" id="category-penghayatan-0" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-0">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][0][2][]" class="custom-control-input" id="category-pengamalan-0" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-0">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][0][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-0" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-0">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][0][3][]" class="custom-control-input" id="field-Integriti-0" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-0">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][0][3][]" class="custom-control-input" id="field-Psikologi-0" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-0">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>45</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][0][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="15">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][0][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][0][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][0][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][0][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][0][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-1">
                            <td class="row-index align-middle"><span>2</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][1][0]" value="CERAMAH KEROHANIAN - PENAWAR HATI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][1][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][1][2][]" class="custom-control-input" id="category-penerapan-1" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-1">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][1][2][]" class="custom-control-input" id="category-penghayatan-1" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-1">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][1][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-1" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-1">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][1][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-1" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-1">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][1][3][]" class="custom-control-input" id="field-Integriti-1" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-1">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][1][3][]" class="custom-control-input" id="field-Psikologi-1" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-1">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>47</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][1][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][1][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][1][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="5">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][1][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][1][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="19">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][1][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="19">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-2">
                            <td class="row-index align-middle"><span>3</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][2][0]" value="CERAMAH JATI DIRI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][2][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][2][2][]" class="custom-control-input" id="category-penerapan-2" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-2">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][2][2][]" class="custom-control-input" id="category-penghayatan-2" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-2">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][2][2][]" class="custom-control-input" id="category-pengamalan-2" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-2">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][2][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-2" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-2">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][2][3][]" class="custom-control-input" id="field-Integriti-2" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-2">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][2][3][]" class="custom-control-input" id="field-Psikologi-2" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-2">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>20</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][2][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][2][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][2][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][2][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][2][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][2][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="10">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-3">
                            <td class="row-index align-middle"><span>4</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][3][0]" value="BICARA KEKELUARGAAN DAN KEROHANIAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][3][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][3][2][]" class="custom-control-input" id="category-penerapan-3" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-3">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][3][2][]" class="custom-control-input" id="category-penghayatan-3" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-3">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][3][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-3" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-3">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][3][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-3" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-3">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][3][3][]" class="custom-control-input" id="field-Integriti-3" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-3">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][3][3][]" class="custom-control-input" id="field-Psikologi-3" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-3">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>10</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][3][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][3][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][3][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][3][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][3][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="5">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][3][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="5">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-4">
                            <td class="row-index align-middle"><span>5</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][4][0]" value="TADARUS AL-QURAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][4][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][4][2][]" class="custom-control-input" id="category-penerapan-4" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-4">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][4][2][]" class="custom-control-input" id="category-penghayatan-4" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-4">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][4][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-4" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-4">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][4][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-4" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-4">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][4][3][]" class="custom-control-input" id="field-Integriti-4" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-4">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][4][3][]" class="custom-control-input" id="field-Psikologi-4" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-4">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>449</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][4][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][4][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][4][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="24">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][4][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="23">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][4][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="200">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][4][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="202">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-5">
                            <td class="row-index align-middle"><span>6</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][5][0]" value="KHATAM AL-QURAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][5][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][5][2][]" class="custom-control-input" id="category-penerapan-5" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-5">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][5][2][]" class="custom-control-input" id="category-penghayatan-5" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-5">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][5][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-5" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-5">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][5][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-5" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-5">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][5][3][]" class="custom-control-input" id="field-Integriti-5" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-5">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][5][3][]" class="custom-control-input" id="field-Psikologi-5" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-5">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>1</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][5][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][5][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][5][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][5][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][5][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="1">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][5][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-6">
                            <td class="row-index align-middle"><span>7</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][6][0]" value="TAZKIRAH DALAM KEHIDUPAN KITA INI PERLU BEKALAN TAQWA (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][6][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][6][2][]" class="custom-control-input" id="category-penerapan-6" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-6">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][6][2][]" class="custom-control-input" id="category-penghayatan-6" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-6">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][6][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-6" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-6">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][6][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-6" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-6">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][6][3][]" class="custom-control-input" id="field-Integriti-6" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-6">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][6][3][]" class="custom-control-input" id="field-Psikologi-6" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-6">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>26</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][6][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][6][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][6][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][6][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="5">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][6][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="8">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][6][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="9">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-7">
                            <td class="row-index align-middle"><span>8</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][7][0]" value="TAZKIRAN - AMALAN 4 PERKARA SEBELUM MATI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][7][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][7][2][]" class="custom-control-input" id="category-penerapan-7" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-7">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][7][2][]" class="custom-control-input" id="category-penghayatan-7" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-7">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][7][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-7" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-7">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][7][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-7" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-7">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][7][3][]" class="custom-control-input" id="field-Integriti-7" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-7">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][7][3][]" class="custom-control-input" id="field-Psikologi-7" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-7">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>24</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][7][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][7][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][7][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][7][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][7][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="8">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][7][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="8">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-8">
                            <td class="row-index align-middle"><span>9</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][8][0]" value="TAZKIRAH - SABAR ITU INDAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][8][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][8][2][]" class="custom-control-input" id="category-penerapan-8" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-8">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][8][2][]" class="custom-control-input" id="category-penghayatan-8" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-8">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][8][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-8" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-8">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][8][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-8" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-8">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][8][3][]" class="custom-control-input" id="field-Integriti-8" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-8">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][8][3][]" class="custom-control-input" id="field-Psikologi-8" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-8">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>24</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][8][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][8][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][8][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][8][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][8][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="7">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][8][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="9">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-9">
                            <td class="row-index align-middle"><span>10</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][9][0]" value="TAZKIRAH - PERSIAPAN SEBELUM RAMADHAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][9][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][9][2][]" class="custom-control-input" id="category-penerapan-9" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-9">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][9][2][]" class="custom-control-input" id="category-penghayatan-9" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-9">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][9][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-9" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-9">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][9][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-9" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-9">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][9][3][]" class="custom-control-input" id="field-Integriti-9" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-9">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][9][3][]" class="custom-control-input" id="field-Psikologi-9" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-9">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>88</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][9][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][9][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][9][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="13">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][9][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="15">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][9][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="30">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][9][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="30">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-10">
                            <td class="row-index align-middle"><span>11</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][10][0]" value="KULIAH MAGHRIB (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][10][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][10][2][]" class="custom-control-input" id="category-penerapan-10" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-10">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][10][2][]" class="custom-control-input" id="category-penghayatan-10" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-10">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][10][2][]" class="custom-control-input" id="category-pengamalan-10" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-10">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][10][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-10" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-10">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][10][3][]" class="custom-control-input" id="field-Integriti-10" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-10">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][10][3][]" class="custom-control-input" id="field-Psikologi-10" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-10">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>6</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][10][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][10][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][10][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="1">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][10][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][10][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="3">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][10][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="2">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-11">
                            <td class="row-index align-middle"><span>12</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][11][0]" value="BACAAN YASSIN / DOA SELAMAT6 / TAHLIL (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][11][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][11][2][]" class="custom-control-input" id="category-penerapan-11" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-11">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][11][2][]" class="custom-control-input" id="category-penghayatan-11" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-11">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][11][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-11" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-11">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][11][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-11" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-11">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][11][3][]" class="custom-control-input" id="field-Integriti-11" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-11">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][11][3][]" class="custom-control-input" id="field-Psikologi-11" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-11">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>1205</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][11][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][11][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][11][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="139">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][11][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="140">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][11][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="425">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][11][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="501">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-12">
                            <td class="row-index align-middle"><span>13</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][12][0]" value="CERAMAH IHYA RAMADHAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][12][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][12][2][]" class="custom-control-input" id="category-penerapan-12" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-12">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][12][2][]" class="custom-control-input" id="category-penghayatan-12" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-12">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][12][2][]" class="custom-control-input" id="category-pengamalan-12" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-12">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][12][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-12" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-12">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][12][3][]" class="custom-control-input" id="field-Integriti-12" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-12">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][12][3][]" class="custom-control-input" id="field-Psikologi-12" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-12">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>109</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][12][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][12][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][12][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="13">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][12][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="14">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][12][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="46">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][12][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="36">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-13">
                            <td class="row-index align-middle"><span>14</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][13][0]" value="CERAMAH AMBANG RAMADHAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][13][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][13][2][]" class="custom-control-input" id="category-penerapan-13" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-13">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][13][2][]" class="custom-control-input" id="category-penghayatan-13" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-13">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][13][2][]" class="custom-control-input" id="category-pengamalan-13" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-13">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][13][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-13" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-13">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][13][3][]" class="custom-control-input" id="field-Integriti-13" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-13">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][13][3][]" class="custom-control-input" id="field-Psikologi-13" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-13">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>269</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][13][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][13][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][13][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="22">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][13][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="22">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][13][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="120">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][13][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="105">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-14">
                            <td class="row-index align-middle"><span>15</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][14][0]" value="PROGRAM LARIAN KE SYURGA (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][14][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][14][2][]" class="custom-control-input" id="category-penerapan-14" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-14">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][14][2][]" class="custom-control-input" id="category-penghayatan-14" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-14">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][14][2][]" class="custom-control-input" id="category-pengamalan-14" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-14">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][14][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-14" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-14">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][14][3][]" class="custom-control-input" id="field-Integriti-14" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-14">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][14][3][]" class="custom-control-input" id="field-Psikologi-14" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-14">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>14</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][14][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][14][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][14][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="1">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][14][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][14][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="5">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][14][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="8">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-15">
                            <td class="row-index align-middle"><span>16</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][15][0]" value="CERAMAH NUZUL AL-QURAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][15][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][15][2][]" class="custom-control-input" id="category-penerapan-15" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-15">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][15][2][]" class="custom-control-input" id="category-penghayatan-15" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-15">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][15][2][]" class="custom-control-input" id="category-pengamalan-15" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-15">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][15][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-15" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-15">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][15][3][]" class="custom-control-input" id="field-Integriti-15" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-15">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][15][3][]" class="custom-control-input" id="field-Psikologi-15" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-15">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>117</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][15][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][15][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][15][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="9">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][15][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][15][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="53">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][15][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="45">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-16">
                            <td class="row-index align-middle"><span>17</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][16][0]" value="KULIAH RAMADHAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][16][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][16][2][]" class="custom-control-input" id="category-penerapan-16" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-16">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][16][2][]" class="custom-control-input" id="category-penghayatan-16" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-16">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][16][2][]" class="custom-control-input" id="category-pengamalan-16" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-16">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][16][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-16" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-16">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][16][3][]" class="custom-control-input" id="field-Integriti-16" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-16">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][16][3][]" class="custom-control-input" id="field-Psikologi-16" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-16">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>205</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][16][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="1">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][16][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="1">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][16][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="16">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][16][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="17">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][16][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="81">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][16][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="89">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-17">
                            <td class="row-index align-middle"><span>18</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][17][0]" value="KULIAH BULANAN SURAU (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][17][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][17][2][]" class="custom-control-input" id="category-penerapan-17" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-17">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][17][2][]" class="custom-control-input" id="category-penghayatan-17" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-17">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][17][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-17" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-17">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][17][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-17" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-17">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][17][3][]" class="custom-control-input" id="field-Integriti-17" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-17">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][17][3][]" class="custom-control-input" id="field-Psikologi-17" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-17">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>54</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][17][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][17][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][17][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="7">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][17][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="8">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][17][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="20">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][17][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="19">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-18">
                            <td class="row-index align-middle"><span>19</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][18][0]" value="SOLAT SUNAT TARAWIH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][18][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][18][2][]" class="custom-control-input" id="category-penerapan-18" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-18">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][18][2][]" class="custom-control-input" id="category-penghayatan-18" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-18">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][18][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-18" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-18">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][18][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-18" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-18">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][18][3][]" class="custom-control-input" id="field-Integriti-18" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-18">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][18][3][]" class="custom-control-input" id="field-Psikologi-18" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-18">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>293</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][18][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][18][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][18][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="18">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][18][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="19">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][18][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="125">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][18][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="131">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-19">
                            <td class="row-index align-middle"><span>20</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][19][0]" value="CERAMAH PERDANA SAMBUTAN RAMADHAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][19][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][19][2][]" class="custom-control-input" id="category-penerapan-19" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-19">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][19][2][]" class="custom-control-input" id="category-penghayatan-19" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-19">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][19][2][]" class="custom-control-input" id="category-pengamalan-19" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-19">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][19][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-19" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-19">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][19][3][]" class="custom-control-input" id="field-Integriti-19" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-19">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][19][3][]" class="custom-control-input" id="field-Psikologi-19" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-19">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>84</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][19][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][19][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][19][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][19][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][19][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="84">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][19][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-20">
                            <td class="row-index align-middle"><span>21</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][20][0]" value="KULIAH DHUHA (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][20][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][20][2][]" class="custom-control-input" id="category-penerapan-20" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-20">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][20][2][]" class="custom-control-input" id="category-penghayatan-20" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-20">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][20][2][]" class="custom-control-input" id="category-pengamalan-20" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-20">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][20][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-20" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-20">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][20][3][]" class="custom-control-input" id="field-Integriti-20" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-20">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][20][3][]" class="custom-control-input" id="field-Psikologi-20" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-20">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>590</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][20][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][20][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][20][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][20][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][20][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="590">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][20][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-21">
                            <td class="row-index align-middle"><span>22</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][21][0]" value="KULIAH DHUHA - HATI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][21][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][21][2][]" class="custom-control-input" id="category-penerapan-21" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-21">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][21][2][]" class="custom-control-input" id="category-penghayatan-21" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-21">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][21][2][]" class="custom-control-input" id="category-pengamalan-21" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-21">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][21][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-21" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-21">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][21][3][]" class="custom-control-input" id="field-Integriti-21" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-21">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][21][3][]" class="custom-control-input" id="field-Psikologi-21" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-21">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>29</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][21][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][21][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][21][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][21][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][21][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="29">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][21][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-22">
                            <td class="row-index align-middle"><span>23</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][22][0]" value="KULIAH DHUHA - JOM MENGEJAR LAILATUL QADAR (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][22][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][22][2][]" class="custom-control-input" id="category-penerapan-22" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-22">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][22][2][]" class="custom-control-input" id="category-penghayatan-22" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-22">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][22][2][]" class="custom-control-input" id="category-pengamalan-22" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-22">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][22][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-22" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-22">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][22][3][]" class="custom-control-input" id="field-Integriti-22" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-22">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][22][3][]" class="custom-control-input" id="field-Psikologi-22" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-22">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>30</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][22][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][22][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][22][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][22][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][22][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="30">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][22][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-23">
                            <td class="row-index align-middle"><span>24</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][23][0]" value="KULIAH DHUHA - KEBERKATAN RAMADHAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][23][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][23][2][]" class="custom-control-input" id="category-penerapan-23" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-23">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][23][2][]" class="custom-control-input" id="category-penghayatan-23" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-23">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][23][2][]" class="custom-control-input" id="category-pengamalan-23" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-23">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][23][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-23" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-23">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][23][3][]" class="custom-control-input" id="field-Integriti-23" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-23">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][23][3][]" class="custom-control-input" id="field-Psikologi-23" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-23">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>18</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][23][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][23][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][23][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][23][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][23][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="18">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][23][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-24">
                            <td class="row-index align-middle"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][24][0]" value="KULIAH MAGHRIB (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][24][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][24][2][]" class="custom-control-input" id="category-penerapan-24" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-24">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][24][2][]" class="custom-control-input" id="category-penghayatan-24" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-24">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][24][2][]" class="custom-control-input" id="category-pengamalan-24" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-24">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][24][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-24" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-24">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][24][3][]" class="custom-control-input" id="field-Integriti-24" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-24">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][24][3][]" class="custom-control-input" id="field-Psikologi-24" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-24">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>184</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][24][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][24][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][24][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][24][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][24][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="184">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][24][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-25">
                            <td class="row-index align-middle"><span>26</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][25][0]" value="CERAMAH PENUGASAN AL-QURAN (APIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][25][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][25][2][]" class="custom-control-input" id="category-penerapan-25" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-25">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][25][2][]" class="custom-control-input" id="category-penghayatan-25" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-25">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][25][2][]" class="custom-control-input" id="category-pengamalan-25" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-25">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][25][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-25" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-25">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][25][3][]" class="custom-control-input" id="field-Integriti-25" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-25">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][25][3][]" class="custom-control-input" id="field-Psikologi-25" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-25">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>17</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][25][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][25][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][25][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][25][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][25][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="17">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][25][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-26">
                            <td class="row-index align-middle"><span>27</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][26][0]" value="PROGRAM KELUARGA ISLAM (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][26][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][26][2][]" class="custom-control-input" id="category-penerapan-26" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-26">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][26][2][]" class="custom-control-input" id="category-penghayatan-26" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-26">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][26][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-26" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-26">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][26][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-26" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-26">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][26][3][]" class="custom-control-input" id="field-Integriti-26" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-26">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][26][3][]" class="custom-control-input" id="field-Psikologi-26" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-26">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][26][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][26][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][26][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][26][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][26][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="25">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][26][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-27">
                            <td class="row-index align-middle"><span>28</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][27][0]" value="CERAMAH AGAMA - PUASA (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][27][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][27][2][]" class="custom-control-input" id="category-penerapan-27" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-27">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][27][2][]" class="custom-control-input" id="category-penghayatan-27" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-27">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][27][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-27" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-27">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][27][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-27" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-27">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][27][3][]" class="custom-control-input" id="field-Integriti-27" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-27">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][27][3][]" class="custom-control-input" id="field-Psikologi-27" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-27">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>347</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][27][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][27][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][27][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][27][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][27][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="230">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][27][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="117">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-28">
                            <td class="row-index align-middle"><span>29</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][28][0]" value="KULIAH AGAMA (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][28][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][28][2][]" class="custom-control-input" id="category-penerapan-28" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-28">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][28][2][]" class="custom-control-input" id="category-penghayatan-28" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-28">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][28][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-28" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-28">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][28][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-28" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-28">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][28][3][]" class="custom-control-input" id="field-Integriti-28" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-28">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][28][3][]" class="custom-control-input" id="field-Psikologi-28" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-28">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>794</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][28][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][28][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][28][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][28][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][28][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="538">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][28][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="256">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-29">
                            <td class="row-index align-middle"><span>30</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][29][0]" value="SOLAT SUNAT DAN TAZKIRAH ISTIQBAL (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][29][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][29][2][]" class="custom-control-input" id="category-penerapan-29" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-29">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][29][2][]" class="custom-control-input" id="category-penghayatan-29" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-29">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][29][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-29" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-29">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][29][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-29" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-29">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][29][3][]" class="custom-control-input" id="field-Integriti-29" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-29">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][29][3][]" class="custom-control-input" id="field-Psikologi-29" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-29">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>60</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][29][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][29][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][29][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][29][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][29][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="25">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][29][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="35">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-30">
                            <td class="row-index align-middle"><span>31</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][30][0]" value="PROGRAM PENGIMARAHAN SURAU (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][30][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][30][2][]" class="custom-control-input" id="category-penerapan-30" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-30">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][30][2][]" class="custom-control-input" id="category-penghayatan-30" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-30">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][30][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-30" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-30">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][30][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-30" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-30">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][30][3][]" class="custom-control-input" id="field-Integriti-30" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-30">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][30][3][]" class="custom-control-input" id="field-Psikologi-30" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-30">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>51</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][30][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][30][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][30][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][30][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][30][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="30">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][30][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="21">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-31">
                            <td class="row-index align-middle"><span>32</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][31][0]" value="TAZKIRAH PAGI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][31][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][31][2][]" class="custom-control-input" id="category-penerapan-31" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-31">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][31][2][]" class="custom-control-input" id="category-penghayatan-31" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-31">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][31][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-31" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-31">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][31][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-31" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-31">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][31][3][]" class="custom-control-input" id="field-Integriti-31" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-31">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][31][3][]" class="custom-control-input" id="field-Psikologi-31" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-31">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][31][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][31][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][31][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][31][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][31][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="15">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][31][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="10">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-32">
                            <td class="row-index align-middle"><span>33</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][32][0]" value="PENGAJIAN AL-QURAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][32][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][32][2][]" class="custom-control-input" id="category-penerapan-32" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-32">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][32][2][]" class="custom-control-input" id="category-penghayatan-32" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-32">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][32][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-32" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-32">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][32][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-32" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-32">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][32][3][]" class="custom-control-input" id="field-Integriti-32" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-32">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][32][3][]" class="custom-control-input" id="field-Psikologi-32" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-32">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>44</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][32][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][32][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][32][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][32][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][32][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="22">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][32][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="22">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-33">
                            <td class="row-index align-middle"><span>34</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][33][0]" value="LDP - FARDHU AIN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][33][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][33][2][]" class="custom-control-input" id="category-penerapan-33" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-33">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][33][2][]" class="custom-control-input" id="category-penghayatan-33" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-33">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][33][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-33" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-33">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][33][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-33" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-33">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][33][3][]" class="custom-control-input" id="field-Integriti-33" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-33">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][33][3][]" class="custom-control-input" id="field-Psikologi-33" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-33">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>78</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][33][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][33][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][33][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][33][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][33][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="68">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][33][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="10">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-34">
                            <td class="row-index align-middle"><span>35</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][34][0]" value="QIAMULAIL (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][34][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][34][2][]" class="custom-control-input" id="category-penerapan-34" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-34">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][34][2][]" class="custom-control-input" id="category-penghayatan-34" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-34">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][34][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-34" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-34">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][34][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-34" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-34">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][34][3][]" class="custom-control-input" id="field-Integriti-34" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-34">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][34][3][]" class="custom-control-input" id="field-Psikologi-34" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-34">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>132</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][34][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][34][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][34][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][34][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][34][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="120">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][34][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="12">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-35">
                            <td class="row-index align-middle"><span>36</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][35][0]" value="CERAMAH - AMALAN BERSEDEKAH DAN KEBAIKAN AMALAN PADA REZEKI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][35][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][35][2][]" class="custom-control-input" id="category-penerapan-35" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-35">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][35][2][]" class="custom-control-input" id="category-penghayatan-35" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-35">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][35][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-35" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-35">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][35][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-35" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-35">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][35][3][]" class="custom-control-input" id="field-Integriti-35" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-35">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][35][3][]" class="custom-control-input" id="field-Psikologi-35" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-35">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>22</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][35][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][35][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][35][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][35][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][35][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="20">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][35][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="2">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-36">
                            <td class="row-index align-middle"><span>37</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][36][0]" value="TAZKIRAH - PUASA SI PENGHUNI ADRYAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][36][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][36][2][]" class="custom-control-input" id="category-penerapan-36" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-36">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][36][2][]" class="custom-control-input" id="category-penghayatan-36" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-36">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][36][2][]" class="custom-control-input" id="category-pengamalan-36" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-36">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][36][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-36" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-36">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][36][3][]" class="custom-control-input" id="field-Integriti-36" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-36">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][36][3][]" class="custom-control-input" id="field-Psikologi-36" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-36">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>22</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][36][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][36][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][36][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][36][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][36][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="22">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][36][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-37">
                            <td class="row-index align-middle"><span>38</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][37][0]" value="TAZKIRAH - MADRASAH PENYUCIAN JIWA (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][37][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][37][2][]" class="custom-control-input" id="category-penerapan-37" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-37">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][37][2][]" class="custom-control-input" id="category-penghayatan-37" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-37">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][37][2][]" class="custom-control-input" id="category-pengamalan-37" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-37">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][37][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-37" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-37">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][37][3][]" class="custom-control-input" id="field-Integriti-37" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-37">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][37][3][]" class="custom-control-input" id="field-Psikologi-37" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-37">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>39</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][37][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][37][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][37][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][37][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][37][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="35">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][37][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="4">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-38">
                            <td class="row-index align-middle"><span>39</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][38][0]" value="CERAMAH ISRAK DAN MIKRAJ (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][38][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][38][2][]" class="custom-control-input" id="category-penerapan-38" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-38">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][38][2][]" class="custom-control-input" id="category-penghayatan-38" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-38">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][38][2][]" class="custom-control-input" id="category-pengamalan-38" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-38">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][38][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-38" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-38">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][38][3][]" class="custom-control-input" id="field-Integriti-38" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-38">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][38][3][]" class="custom-control-input" id="field-Psikologi-38" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-38">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>55</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][38][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][38][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][38][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][38][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][38][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="50">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][38][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="5">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-39">
                            <td class="row-index align-middle"><span>40</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][39][0]" value="TAZKIYAH AL-NAFS (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][39][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][39][2][]" class="custom-control-input" id="category-penerapan-39" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-39">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][39][2][]" class="custom-control-input" id="category-penghayatan-39" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-39">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][39][2][]" class="custom-control-input" id="category-pengamalan-39" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-39">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][39][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-39" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-39">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][39][3][]" class="custom-control-input" id="field-Integriti-39" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-39">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][39][3][]" class="custom-control-input" id="field-Psikologi-39" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-39">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>10</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][39][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][39][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][39][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][39][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][39][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][39][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-40">
                            <td class="row-index align-middle"><span>41</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][40][0]" value="CERAMAH - PENGHAYATAN AL-QURAN DALAM KEHIDUPAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][40][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][40][2][]" class="custom-control-input" id="category-penerapan-40" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-40">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][40][2][]" class="custom-control-input" id="category-penghayatan-40" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-40">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][40][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-40" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-40">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][40][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-40" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-40">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][40][3][]" class="custom-control-input" id="field-Integriti-40" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-40">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][40][3][]" class="custom-control-input" id="field-Psikologi-40" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-40">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>173</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][40][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][40][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][40][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][40][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][40][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="122">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][40][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="51">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-41">
                            <td class="row-index align-middle"><span>42</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][41][0]" value="CERAMAH CUKAI PENDAPATAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][41][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][41][2][]" class="custom-control-input" id="category-penerapan-41" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-41">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][41][2][]" class="custom-control-input" id="category-penghayatan-41" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-41">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][41][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-41" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-41">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][41][3][]" class="custom-control-input" id="field-Kerohanian-41" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-41">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][41][3][]" class="custom-control-input" checked="checked" id="field-Integriti-41" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-41">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][41][3][]" class="custom-control-input" id="field-Psikologi-41" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-41">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>151</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][41][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][41][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][41][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][41][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][41][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="95">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][41][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="56">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-42">
                            <td class="row-index align-middle"><span>43</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][42][0]" value="CERAMAH ANTI RASUAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][42][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][42][2][]" class="custom-control-input" id="category-penerapan-42" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-42">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][42][2][]" class="custom-control-input" id="category-penghayatan-42" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-42">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][42][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-42" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-42">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][42][3][]" class="custom-control-input" id="field-Kerohanian-42" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-42">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][42][3][]" class="custom-control-input" checked="checked" id="field-Integriti-42" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-42">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][42][3][]" class="custom-control-input" id="field-Psikologi-42" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-42">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>96</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][42][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][42][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][42][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][42][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][42][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="62">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][42][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="34">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-43">
                            <td class="row-index align-middle"><span>44</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][43][0]" value="UPACARA MENURUNKAN BENDERA (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][43][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][43][2][]" class="custom-control-input" id="category-penerapan-43" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-43">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][43][2][]" class="custom-control-input" id="category-penghayatan-43" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-43">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][43][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-43" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-43">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][43][3][]" class="custom-control-input" id="field-Kerohanian-43" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-43">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][43][3][]" class="custom-control-input" checked="checked" id="field-Integriti-43" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-43">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][43][3][]" class="custom-control-input" id="field-Psikologi-43" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-43">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>17</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][43][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][43][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][43][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][43][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][43][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="17">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][43][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-44">
                            <td class="row-index align-middle"><span>45</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][44][0]" value="KURSUS INDUKSI KONSTABEL (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][44][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][44][2][]" class="custom-control-input" id="category-penerapan-44" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-44">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][44][2][]" class="custom-control-input" id="category-penghayatan-44" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-44">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][44][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-44" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-44">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][44][3][]" class="custom-control-input" id="field-Kerohanian-44" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-44">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][44][3][]" class="custom-control-input" checked="checked" id="field-Integriti-44" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-44">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][44][3][]" class="custom-control-input" id="field-Psikologi-44" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-44">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>31</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][44][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][44][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][44][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][44][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][44][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="31">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][44][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-45">
                            <td class="row-index align-middle"><span>46</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][45][0]" value="KURSUS INDUKSI MEMANDU KENDERAAN RINGAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][45][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][45][2][]" class="custom-control-input" id="category-penerapan-45" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-45">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][45][2][]" class="custom-control-input" id="category-penghayatan-45" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-45">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][45][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-45" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-45">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][45][3][]" class="custom-control-input" id="field-Kerohanian-45" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-45">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][45][3][]" class="custom-control-input" checked="checked" id="field-Integriti-45" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-45">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][45][3][]" class="custom-control-input" id="field-Psikologi-45" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-45">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][45][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][45][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][45][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][45][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][45][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="15">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][45][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="10">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-46">
                            <td class="row-index align-middle"><span>47</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][46][0]" value="LATIHAN MENENBAK (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][46][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][46][2][]" class="custom-control-input" id="category-penerapan-46" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-46">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][46][2][]" class="custom-control-input" id="category-penghayatan-46" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-46">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][46][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-46" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-46">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][46][3][]" class="custom-control-input" id="field-Kerohanian-46" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-46">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][46][3][]" class="custom-control-input" checked="checked" id="field-Integriti-46" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-46">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][46][3][]" class="custom-control-input" id="field-Psikologi-46" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-46">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>390</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][46][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][46][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][46][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][46][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][46][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="325">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][46][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="65">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-47">
                            <td class="row-index align-middle"><span>48</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][47][0]" value="LDP-PEMANTAPAN SAHSIAH DAN KEROHANIAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][47][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][47][2][]" class="custom-control-input" id="category-penerapan-47" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-47">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][47][2][]" class="custom-control-input" id="category-penghayatan-47" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-47">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][47][2][]" class="custom-control-input" id="category-pengamalan-47" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-47">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][47][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-47" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-47">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][47][3][]" class="custom-control-input" id="field-Integriti-47" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-47">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][47][3][]" class="custom-control-input" id="field-Psikologi-47" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-47">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>21</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][47][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][47][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][47][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][47][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][47][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="21">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][47][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-48">
                            <td class="row-index align-middle"><span>49</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][48][0]" value="MAJLIS LAFAZ IKRAR (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][48][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][48][2][]" class="custom-control-input" id="category-penerapan-48" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-48">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][48][2][]" class="custom-control-input" id="category-penghayatan-48" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-48">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][48][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-48" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-48">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][48][3][]" class="custom-control-input" id="field-Kerohanian-48" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-48">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][48][3][]" class="custom-control-input" checked="checked" id="field-Integriti-48" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-48">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][48][3][]" class="custom-control-input" id="field-Psikologi-48" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-48">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>100</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][48][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][48][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][48][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][48][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][48][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="65">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][48][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="35">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-49">
                            <td class="row-index align-middle"><span>50</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][49][0]" value="LDP TATACARA PENULISAN POLM 303 DAN PENYELENGGRAAN KENDERAAN PASUKAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][49][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][49][2][]" class="custom-control-input" id="category-penerapan-49" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-49">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][49][2][]" class="custom-control-input" id="category-penghayatan-49" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-49">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][49][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-49" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-49">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][49][3][]" class="custom-control-input" id="field-Kerohanian-49" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-49">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][49][3][]" class="custom-control-input" checked="checked" id="field-Integriti-49" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-49">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][49][3][]" class="custom-control-input" id="field-Psikologi-49" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-49">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>6</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][49][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][49][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][49][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][49][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][49][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="6">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][49][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-50">
                            <td class="row-index align-middle"><span>51</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][50][0]" value="KURSUS PENGURUSAN JENAZAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][50][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][50][2][]" class="custom-control-input" id="category-penerapan-50" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-50">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][50][2][]" class="custom-control-input" id="category-penghayatan-50" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-50">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][50][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-50" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-50">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][50][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-50" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-50">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][50][3][]" class="custom-control-input" id="field-Integriti-50" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-50">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][50][3][]" class="custom-control-input" id="field-Psikologi-50" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-50">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>21</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][50][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][50][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][50][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][50][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][50][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="17">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][50][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="4">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-51">
                            <td class="row-index align-middle"><span>52</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][51][0]" value="TAKLIMAT CELIK KEWANGAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][51][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][51][2][]" class="custom-control-input" id="category-penerapan-51" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-51">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][51][2][]" class="custom-control-input" id="category-penghayatan-51" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-51">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][51][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-51" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-51">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][51][3][]" class="custom-control-input" id="field-Kerohanian-51" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-51">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][51][3][]" class="custom-control-input" checked="checked" id="field-Integriti-51" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-51">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][51][3][]" class="custom-control-input" id="field-Psikologi-51" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-51">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>21</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][51][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][51][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][51][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][51][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][51][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][51][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="11">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-52">
                            <td class="row-index align-middle"><span>53</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][52][0]" value="PENILAIAN SISTEM PEMPROFILAN KESELAMATAN (SPIK) (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][52][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][52][2][]" class="custom-control-input" id="category-penerapan-52" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-52">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][52][2][]" class="custom-control-input" id="category-penghayatan-52" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-52">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][52][2][]" class="custom-control-input" id="category-pengamalan-52" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-52">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][52][3][]" class="custom-control-input" id="field-Kerohanian-52" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-52">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][52][3][]" class="custom-control-input" checked="checked" id="field-Integriti-52" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-52">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][52][3][]" class="custom-control-input" id="field-Psikologi-52" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-52">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>167</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][52][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][52][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][52][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][52][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][52][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="81">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][52][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="86">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-53">
                            <td class="row-index align-middle"><span>54</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][53][0]" value="LDP - SENI MEMPERTAHANKAN DIRI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][53][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][53][2][]" class="custom-control-input" id="category-penerapan-53" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-53">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][53][2][]" class="custom-control-input" id="category-penghayatan-53" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-53">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][53][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-53" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-53">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][53][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-53" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-53">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][53][3][]" class="custom-control-input" checked="checked" id="field-Integriti-53" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-53">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][53][3][]" class="custom-control-input" id="field-Psikologi-53" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-53">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][53][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][53][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][53][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][53][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][53][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="25">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][53][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-54">
                            <td class="row-index align-middle"><span>55</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][54][0]" value="LDP - MOTIVASI TUGAS DAN IBADAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][54][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][54][2][]" class="custom-control-input" id="category-penerapan-54" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-54">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][54][2][]" class="custom-control-input" id="category-penghayatan-54" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-54">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][54][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-54" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-54">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][54][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-54" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-54">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][54][3][]" class="custom-control-input" id="field-Integriti-54" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-54">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][54][3][]" class="custom-control-input" id="field-Psikologi-54" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-54">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>30</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][54][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][54][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][54][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][54][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][54][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="20">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][54][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="10">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-55">
                            <td class="row-index align-middle"><span>56</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][55][0]" value="PEMANTAPAN AKIDAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][55][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][55][2][]" class="custom-control-input" id="category-penerapan-55" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-55">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][55][2][]" class="custom-control-input" id="category-penghayatan-55" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-55">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][55][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-55" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-55">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][55][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-55" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-55">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][55][3][]" class="custom-control-input" id="field-Integriti-55" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-55">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][55][3][]" class="custom-control-input" id="field-Psikologi-55" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-55">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>110</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][55][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][55][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][55][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][55][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][55][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="58">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][55][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="52">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-56">
                            <td class="row-index align-middle"><span>57</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][56][0]" value="LDP - PEMANTAPAN IBADAH YANG BERKUALITI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][56][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][56][2][]" class="custom-control-input" id="category-penerapan-56" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-56">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][56][2][]" class="custom-control-input" id="category-penghayatan-56" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-56">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][56][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-56" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-56">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][56][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-56" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-56">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][56][3][]" class="custom-control-input" id="field-Integriti-56" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-56">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][56][3][]" class="custom-control-input" id="field-Psikologi-56" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-56">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][56][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][56][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][56][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][56][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][56][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="14">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][56][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="11">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-57">
                            <td class="row-index align-middle"><span>58</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][57][0]" value="KURSUS UNDANG - UNDANG KANUN KESEKSAAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][57][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][57][2][]" class="custom-control-input" id="category-penerapan-57" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-57">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][57][2][]" class="custom-control-input" id="category-penghayatan-57" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-57">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][57][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-57" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-57">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][57][3][]" class="custom-control-input" id="field-Kerohanian-57" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-57">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][57][3][]" class="custom-control-input" checked="checked" id="field-Integriti-57" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-57">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][57][3][]" class="custom-control-input" id="field-Psikologi-57" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-57">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>40</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][57][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][57][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][57][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][57][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][57][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="25">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][57][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="15">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-58">
                            <td class="row-index align-middle"><span>59</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][58][0]" value="LDP - ISU DAN CABARAN TERHADAP ANCAMAN KESELAMATAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][58][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][58][2][]" class="custom-control-input" id="category-penerapan-58" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-58">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][58][2][]" class="custom-control-input" id="category-penghayatan-58" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-58">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][58][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-58" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-58">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][58][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-58" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-58">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][58][3][]" class="custom-control-input" id="field-Integriti-58" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-58">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][58][3][]" class="custom-control-input" id="field-Psikologi-58" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-58">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>24</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][58][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][58][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][58][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][58][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][58][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="18">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][58][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="6">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-59">
                            <td class="row-index align-middle"><span>60</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][59][0]" value="CERAMAH KESEDARAN JENAYAH SEKSUAL DAN DADAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][59][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][59][2][]" class="custom-control-input" id="category-penerapan-59" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-59">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][59][2][]" class="custom-control-input" id="category-penghayatan-59" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-59">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][59][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-59" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-59">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][59][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-59" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-59">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][59][3][]" class="custom-control-input" checked="checked" id="field-Integriti-59" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-59">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][59][3][]" class="custom-control-input" id="field-Psikologi-59" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-59">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>6</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][59][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][59][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][59][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][59][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][59][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][59][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="2">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-60">
                            <td class="row-index align-middle"><span>61</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][60][0]" value="LDP - TATACARA KOMUNIKASI CEMERLANG UNTUK BARISAN HADAPAN">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][60][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][60][2][]" class="custom-control-input" id="category-penerapan-60" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-60">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][60][2][]" class="custom-control-input" id="category-penghayatan-60" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-60">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][60][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-60" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-60">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][60][3][]" class="custom-control-input" id="field-Kerohanian-60" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-60">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][60][3][]" class="custom-control-input" checked="checked" id="field-Integriti-60" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-60">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][60][3][]" class="custom-control-input" id="field-Psikologi-60" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-60">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>10</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][60][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][60][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][60][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][60][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][60][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][60][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-61">
                            <td class="row-index align-middle"><span>62</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][61][0]" value="LDP - KURSUS PEMANTAPAN PATROLIMAN (MPV) (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][61][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][61][2][]" class="custom-control-input" id="category-penerapan-61" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-61">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][61][2][]" class="custom-control-input" id="category-penghayatan-61" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-61">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][61][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-61" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-61">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][61][3][]" class="custom-control-input" id="field-Kerohanian-61" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-61">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][61][3][]" class="custom-control-input" checked="checked" id="field-Integriti-61" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-61">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][61][3][]" class="custom-control-input" id="field-Psikologi-61" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-61">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][61][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][61][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][61][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][61][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][61][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="25">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][61][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-62">
                            <td class="row-index align-middle"><span>63</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][62][0]" value="SEMINAR PERKONGSIAN ILMU (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][62][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][62][2][]" class="custom-control-input" id="category-penerapan-62" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-62">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][62][2][]" class="custom-control-input" id="category-penghayatan-62" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-62">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][62][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-62" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-62">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][62][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-62" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-62">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][62][3][]" class="custom-control-input" id="field-Integriti-62" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-62">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][62][3][]" class="custom-control-input" id="field-Psikologi-62" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-62">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>37</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][62][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][62][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][62][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][62][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][62][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="21">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][62][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="16">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-63">
                            <td class="row-index align-middle"><span>64</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][63][0]" value="LDP TATACARA MEMBERI KETERANGAN DIMAHKAMAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][63][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][63][2][]" class="custom-control-input" id="category-penerapan-63" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-63">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][63][2][]" class="custom-control-input" id="category-penghayatan-63" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-63">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][63][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-63" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-63">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][63][3][]" class="custom-control-input" id="field-Kerohanian-63" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-63">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][63][3][]" class="custom-control-input" checked="checked" id="field-Integriti-63" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-63">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][63][3][]" class="custom-control-input" id="field-Psikologi-63" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-63">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>40</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][63][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][63][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][63][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][63][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][63][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="40">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][63][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-64">
                            <td class="row-index align-middle"><span>65</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][64][0]" value="LDP PTKPN A112 SISTEM BIT DAN PATROL (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][64][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][64][2][]" class="custom-control-input" id="category-penerapan-64" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-64">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][64][2][]" class="custom-control-input" id="category-penghayatan-64" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-64">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][64][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-64" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-64">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][64][3][]" class="custom-control-input" id="field-Kerohanian-64" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-64">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][64][3][]" class="custom-control-input" checked="checked" id="field-Integriti-64" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-64">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][64][3][]" class="custom-control-input" id="field-Psikologi-64" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-64">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>10</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][64][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][64][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][64][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][64][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][64][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="10">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][64][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-65">
                            <td class="row-index align-middle"><span>66</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][65][0]" value="LDP PERKHIDMATAN KAUNTER ADUAN (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][65][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][65][2][]" class="custom-control-input" id="category-penerapan-65" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-65">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][65][2][]" class="custom-control-input" id="category-penghayatan-65" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-65">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][65][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-65" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-65">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][65][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-65" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-65">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][65][3][]" class="custom-control-input" checked="checked" id="field-Integriti-65" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-65">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][65][3][]" class="custom-control-input" id="field-Psikologi-65" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-65">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>440</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][65][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][65][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][65][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][65][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][65][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="364">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][65][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="76">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-66">
                            <td class="row-index align-middle"><span>67</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][66][0]" value="LDP PTKPN 116 (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][66][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][66][2][]" class="custom-control-input" id="category-penerapan-66" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-66">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][66][2][]" class="custom-control-input" id="category-penghayatan-66" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-66">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][66][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-66" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-66">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][66][3][]" class="custom-control-input" id="field-Kerohanian-66" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-66">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][66][3][]" class="custom-control-input" checked="checked" id="field-Integriti-66" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-66">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][66][3][]" class="custom-control-input" id="field-Psikologi-66" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-66">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>81</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][66][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][66][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][66][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][66][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][66][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="72">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][66][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="9">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-67">
                            <td class="row-index align-middle"><span>68</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][67][0]" value="LDP TATACARA PENYEDIAAN RINGKASAN JENAYAH (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][67][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][67][2][]" class="custom-control-input" id="category-penerapan-67" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-67">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][67][2][]" class="custom-control-input" id="category-penghayatan-67" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-67">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][67][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-67" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-67">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][67][3][]" class="custom-control-input" id="field-Kerohanian-67" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-67">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][67][3][]" class="custom-control-input" checked="checked" id="field-Integriti-67" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-67">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][67][3][]" class="custom-control-input" id="field-Psikologi-67" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-67">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>25</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][67][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][67][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][67][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][67][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][67][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="18">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][67][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="7">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-68">
                            <td class="row-index align-middle"><span>69</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][68][0]" value="LDP TANGGUNGJAWAB PENYELIA">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][68][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][68][2][]" class="custom-control-input" id="category-penerapan-68" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-68">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][68][2][]" class="custom-control-input" id="category-penghayatan-68" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-68">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][68][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-68" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-68">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][68][3][]" class="custom-control-input" id="field-Kerohanian-68" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-68">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][68][3][]" class="custom-control-input" checked="checked" id="field-Integriti-68" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-68">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][68][3][]" class="custom-control-input" id="field-Psikologi-68" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-68">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>21</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][68][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][68][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][68][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][68][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][68][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="16">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][68][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="5">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-69">
                            <td class="row-index align-middle"><span>70</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][69][0]" value="LDP PEMBANGUNAN MODAL INSAN KE ARAH BUDAYA KERJA CEMERLANG (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][69][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][69][2][]" class="custom-control-input" id="category-penerapan-69" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-69">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][69][2][]" class="custom-control-input" id="category-penghayatan-69" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-69">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][69][2][]" class="custom-control-input" id="category-pengamalan-69" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-69">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][69][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-69" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-69">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][69][3][]" class="custom-control-input" id="field-Integriti-69" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-69">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][69][3][]" class="custom-control-input" id="field-Psikologi-69" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-69">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>51</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][69][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][69][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][69][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][69][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][69][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="35">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][69][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="16">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-70">
                            <td class="row-index align-middle"><span>71</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][70][0]" value="LDP SKDD DAN PEMANTAPAN INTEGRITI (APRIL 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][70][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][70][2][]" class="custom-control-input" id="category-penerapan-70" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-70">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][70][2][]" class="custom-control-input" id="category-penghayatan-70" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-70">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][70][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-70" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-70">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][70][3][]" class="custom-control-input" id="field-Kerohanian-70" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-70">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][70][3][]" class="custom-control-input" checked="checked" id="field-Integriti-70" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-70">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][70][3][]" class="custom-control-input" id="field-Psikologi-70" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-70">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>47</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][70][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][70][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][70][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][70][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][70][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="35">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][70][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="12">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-71">
                            <td class="row-index align-middle"><span>72</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][71][0]" value="KURSUS JKCEMERLANG KERJAYA">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][71][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][71][2][]" class="custom-control-input" id="category-penerapan-71" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-71">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][71][2][]" class="custom-control-input" id="category-penghayatan-71" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-71">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][71][2][]" class="custom-control-input" id="category-pengamalan-71" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-71">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][71][3][]" class="custom-control-input" id="field-Kerohanian-71" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-71">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][71][3][]" class="custom-control-input" id="field-Integriti-71" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-71">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][71][3][]" class="custom-control-input" id="field-Psikologi-71" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-71">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>0</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][71][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][71][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][71][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][71][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][71][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][71][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-72">
                            <td class="row-index align-middle"><span>73</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][72][0]" value="CERAMAH IBRAH &amp; TADABBUR (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][72][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][72][2][]" class="custom-control-input" id="category-penerapan-72" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-72">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][72][2][]" class="custom-control-input" id="category-penghayatan-72" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-72">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][72][2][]" class="custom-control-input" id="category-pengamalan-72" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-72">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][72][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-72" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-72">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][72][3][]" class="custom-control-input" id="field-Integriti-72" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-72">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][72][3][]" class="custom-control-input" id="field-Psikologi-72" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-72">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>261</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][72][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="2">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][72][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][72][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="16">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][72][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="16">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][72][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="187">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][72][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="40">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-73">
                            <td class="row-index align-middle"><span>74</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][73][0]" value="KELAS MENGAJI (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][73][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][73][2][]" class="custom-control-input" id="category-penerapan-73" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-73">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][73][2][]" class="custom-control-input" id="category-penghayatan-73" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-73">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][73][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-73" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-73">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][73][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-73" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-73">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][73][3][]" class="custom-control-input" id="field-Integriti-73" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-73">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][73][3][]" class="custom-control-input" id="field-Psikologi-73" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-73">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>266</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][73][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][73][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][73][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="16">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][73][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="13">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][73][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="139">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][73][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="98">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-74">
                            <td class="row-index align-middle"><span>75</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][74][0]" value="PROGRAM TADABBUR (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][74][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][74][2][]" class="custom-control-input" id="category-penerapan-74" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-74">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][74][2][]" class="custom-control-input" id="category-penghayatan-74" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-74">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][74][2][]" class="custom-control-input" id="category-pengamalan-74" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-74">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][74][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-74" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-74">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][74][3][]" class="custom-control-input" id="field-Integriti-74" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-74">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][74][3][]" class="custom-control-input" id="field-Psikologi-74" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-74">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>59</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][74][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][74][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][74][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="8">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][74][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][74][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="36">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][74][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="11">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-75">
                            <td class="row-index align-middle"><span>76</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][75][0]" value="SOLAT HAJAT (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][75][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][75][2][]" class="custom-control-input" id="category-penerapan-75" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-75">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][75][2][]" class="custom-control-input" id="category-penghayatan-75" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-75">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][75][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-75" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-75">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][75][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-75" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-75">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][75][3][]" class="custom-control-input" id="field-Integriti-75" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-75">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][75][3][]" class="custom-control-input" id="field-Psikologi-75" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-75">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>76</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][75][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][75][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][75][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="6">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][75][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="3">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][75][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="52">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][75][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="15">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-76">
                            <td class="row-index align-middle"><span>77</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][76][0]" value="SOLAT MENGIKUT SUNNAH">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][76][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][76][2][]" class="custom-control-input" id="category-penerapan-76" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-76">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][76][2][]" class="custom-control-input" id="category-penghayatan-76" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-76">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][76][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-76" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-76">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][76][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-76" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-76">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][76][3][]" class="custom-control-input" id="field-Integriti-76" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-76">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][76][3][]" class="custom-control-input" id="field-Psikologi-76" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-76">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>43</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][76][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][76][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][76][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="3">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][76][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][76][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="14">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][76][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="26">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-77">
                            <td class="row-index align-middle"><span>78</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][77][0]" value="CERAMAH ISRAK&amp; MIKRAJ (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][77][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][77][2][]" class="custom-control-input" id="category-penerapan-77" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-77">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][77][2][]" class="custom-control-input" id="category-penghayatan-77" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-77">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][77][2][]" class="custom-control-input" id="category-pengamalan-77" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-77">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][77][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-77" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-77">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][77][3][]" class="custom-control-input" id="field-Integriti-77" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-77">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][77][3][]" class="custom-control-input" id="field-Psikologi-77" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-77">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>522</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][77][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][77][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][77][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="111">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][77][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="58">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][77][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="268">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][77][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="85">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-78">
                            <td class="row-index align-middle"><span>79</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][78][0]" value="KULAIH MAGHRIB (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][78][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][78][2][]" class="custom-control-input" id="category-penerapan-78" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-78">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][78][2][]" class="custom-control-input" id="category-penghayatan-78" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-78">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][78][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-78" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-78">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][78][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-78" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-78">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][78][3][]" class="custom-control-input" id="field-Integriti-78" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-78">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][78][3][]" class="custom-control-input" id="field-Psikologi-78" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-78">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>1416</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][78][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][78][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][78][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="17">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][78][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][78][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="1347">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][78][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="52">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-79">
                            <td class="row-index align-middle"><span>80</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][79][0]" value="CERAMAH KEAGAMAAN (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][79][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][79][2][]" class="custom-control-input" id="category-penerapan-79" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-79">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][79][2][]" class="custom-control-input" id="category-penghayatan-79" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-79">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][79][2][]" class="custom-control-input" id="category-pengamalan-79" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-79">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][79][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-79" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-79">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][79][3][]" class="custom-control-input" id="field-Integriti-79" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-79">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][79][3][]" class="custom-control-input" id="field-Psikologi-79" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-79">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>465</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][79][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][79][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][79][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="82">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][79][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="22">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][79][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="273">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][79][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="88">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-80">
                            <td class="row-index align-middle"><span>81</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][80][0]" value="PENGUASAAN AL-QURAN">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][80][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][80][2][]" class="custom-control-input" id="category-penerapan-80" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-80">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][80][2][]" class="custom-control-input" id="category-penghayatan-80" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-80">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][80][2][]" class="custom-control-input" id="category-pengamalan-80" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-80">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][80][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-80" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-80">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][80][3][]" class="custom-control-input" id="field-Integriti-80" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-80">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][80][3][]" class="custom-control-input" id="field-Psikologi-80" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-80">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>20</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][80][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][80][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][80][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="1">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][80][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="2">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][80][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="11">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][80][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="6">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-81">
                            <td class="row-index align-middle"><span>82</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][81][0]" value="CERAMAH AGAMA, &quot;ADAB, MUHASABAH &amp; PERGAULAN&quot; (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][81][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][81][2][]" class="custom-control-input" id="category-penerapan-81" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-81">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][81][2][]" class="custom-control-input" id="category-penghayatan-81" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-81">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][81][2][]" class="custom-control-input" id="category-pengamalan-81" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-81">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][81][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-81" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-81">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][81][3][]" class="custom-control-input" id="field-Integriti-81" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-81">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][81][3][]" class="custom-control-input" id="field-Psikologi-81" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-81">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>205</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][81][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][81][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][81][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="20">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][81][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="13">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][81][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="105">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][81][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="67">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-82">
                            <td class="row-index align-middle"><span>83</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][82][0]" value="CERAMAH AGAMA SEMPENA HARI POLIS (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][82][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][82][2][]" class="custom-control-input" id="category-penerapan-82" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-82">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][82][2][]" class="custom-control-input" id="category-penghayatan-82" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-82">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][82][2][]" class="custom-control-input" id="category-pengamalan-82" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-82">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][82][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-82" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-82">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][82][3][]" class="custom-control-input" checked="checked" id="field-Integriti-82" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-82">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][82][3][]" class="custom-control-input" id="field-Psikologi-82" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-82">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>27</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][82][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][82][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][82][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][82][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="3">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][82][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="16">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][82][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="4">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-83">
                            <td class="row-index align-middle"><span>84</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][83][0]" value="LDP PENYEMBELIHAN (JAN-MAC  2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][83][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][83][2][]" class="custom-control-input" id="category-penerapan-83" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-83">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][83][2][]" class="custom-control-input" id="category-penghayatan-83" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-83">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][83][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-83" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-83">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][83][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-83" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-83">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][83][3][]" class="custom-control-input" id="field-Integriti-83" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-83">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][83][3][]" class="custom-control-input" id="field-Psikologi-83" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-83">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>40</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][83][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][83][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][83][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="3">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][83][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="2">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][83][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="27">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][83][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="8">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-84">
                            <td class="row-index align-middle"><span>85</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][84][0]" value="CERAMAHAMBANG RAMADHAN (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][84][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][84][2][]" class="custom-control-input" id="category-penerapan-84" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-84">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][84][2][]" class="custom-control-input" id="category-penghayatan-84" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-84">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][84][2][]" class="custom-control-input" id="category-pengamalan-84" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-84">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][84][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-84" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-84">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][84][3][]" class="custom-control-input" id="field-Integriti-84" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-84">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][84][3][]" class="custom-control-input" id="field-Psikologi-84" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-84">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>35</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][84][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][84][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][84][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="5">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][84][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="3">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][84][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="18">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][84][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="9">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-85">
                            <td class="row-index align-middle"><span>86</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][85][0]" value="MENELADANI KEPIMPINAN RASULULLAH SAW (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][85][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][85][2][]" class="custom-control-input" id="category-penerapan-85" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-85">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][85][2][]" class="custom-control-input" id="category-penghayatan-85" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-85">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][85][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-85" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-85">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][85][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-85" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-85">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][85][3][]" class="custom-control-input" id="field-Integriti-85" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-85">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][85][3][]" class="custom-control-input" id="field-Psikologi-85" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-85">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>110</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][85][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][85][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][85][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="5">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][85][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="5">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][85][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="87">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][85][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="13">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-86">
                            <td class="row-index align-middle"><span>87</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][86][0]" value="KELAS PENGAJIAN KITAB FIQH MANHAJI (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][86][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][86][2][]" class="custom-control-input" id="category-penerapan-86" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-86">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][86][2][]" class="custom-control-input" id="category-penghayatan-86" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-86">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][86][2][]" class="custom-control-input" id="category-pengamalan-86" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-86">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][86][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-86" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-86">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][86][3][]" class="custom-control-input" id="field-Integriti-86" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-86">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][86][3][]" class="custom-control-input" id="field-Psikologi-86" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-86">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>2</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][86][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][86][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][86][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][86][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][86][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="2">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][86][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-87">
                            <td class="row-index align-middle"><span>88</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][87][0]" value="PROGRAM MEMBUDAYAKAN AL-QURAN (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][87][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][87][2][]" class="custom-control-input" id="category-penerapan-87" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-87">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][87][2][]" class="custom-control-input" id="category-penghayatan-87" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-87">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][87][2][]" class="custom-control-input" id="category-pengamalan-87" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-87">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][87][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-87" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-87">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][87][3][]" class="custom-control-input" id="field-Integriti-87" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-87">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][87][3][]" class="custom-control-input" id="field-Psikologi-87" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-87">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>1705</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][87][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][87][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][87][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="50">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][87][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="40">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][87][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="1364">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][87][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="251">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-88">
                            <td class="row-index align-middle"><span>89</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][88][0]" value="TAZKIRAH 10 NASIHAT LUQMANUL HAKIM (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][88][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][88][2][]" class="custom-control-input" id="category-penerapan-88" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-88">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][88][2][]" class="custom-control-input" id="category-penghayatan-88" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-88">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][88][2][]" class="custom-control-input" id="category-pengamalan-88" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-88">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][88][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-88" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-88">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][88][3][]" class="custom-control-input" id="field-Integriti-88" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-88">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][88][3][]" class="custom-control-input" id="field-Psikologi-88" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-88">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>53</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][88][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][88][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][88][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="43">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][88][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][88][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][88][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="10">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-89">
                            <td class="row-index align-middle"><span>90</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][89][0]" value="TAUBAT SEBELUM TERLAMBAT (JAN-MAC 2021)">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][89][1]" value="">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][89][2][]" class="custom-control-input" id="category-penerapan-89" checked="checked" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-89">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][89][2][]" class="custom-control-input" id="category-penghayatan-89" checked="checked" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-89">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][89][2][]" class="custom-control-input" checked="checked" id="category-pengamalan-89" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-89">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][89][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-89" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-89">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][89][3][]" class="custom-control-input" id="field-Integriti-89" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-89">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][89][3][]" class="custom-control-input" id="field-Psikologi-89" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-89">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>26</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][89][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][89][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][89][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="22">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][89][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="4">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][89][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][89][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-90">
                            <td class="row-index align-middle"><span>91</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][90][0]" value="Test">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][90][1]" value="2">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][90][2][]" class="custom-control-input" id="category-penerapan-90" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-90">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][90][2][]" class="custom-control-input" id="category-penghayatan-90" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-90">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][90][2][]" class="custom-control-input" id="category-pengamalan-90" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-90">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][90][3][]" class="custom-control-input" checked="checked" id="field-Kerohanian-90" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-90">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][90][3][]" class="custom-control-input" id="field-Integriti-90" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-90">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][90][3][]" class="custom-control-input" id="field-Psikologi-90" checked="checked" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-90">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>0</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][90][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][90][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][90][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][90][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][90][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][90][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                        <tr id="record-91">
                            <td class="row-index align-middle"><span>92</span></td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][91][0]" value="Test 2">
                            </td>
                            <td>
                                <input class="form-control p-1" type="text" name="questions[92][91][1]" value="4">
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][91][2][]" class="custom-control-input" id="category-penerapan-91" value="Penerapan">
                                    <label class="custom-control-label" for="category-penerapan-91">Penerapan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][91][2][]" class="custom-control-input" id="category-penghayatan-91" value="Penghayatan">
                                    <label class="custom-control-label" for="category-penghayatan-91">Penghayatan</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][91][2][]" class="custom-control-input" id="category-pengamalan-91" value="Pengamalan">
                                    <label class="custom-control-label" for="category-pengamalan-91">Pengamalan</label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][91][3][]" class="custom-control-input" id="field-Kerohanian-91" value="Kerohanian">
                                    <label class="custom-control-label" for="field-Kerohanian-91">Kerohanian</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][91][3][]" class="custom-control-input" checked="checked" id="field-Integriti-91" value="Integriti">
                                    <label class="custom-control-label" for="field-Integriti-91">Integriti</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="questions[92][91][3][]" class="custom-control-input" id="field-Psikologi-91" value="Psikologi">
                                    <label class="custom-control-label" for="field-Psikologi-91">Psikologi</label>
                                </div>
                            </td>
                            <td class="auto-sum text-center"><span>0</span></td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][91][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][91][KUMPULAN PERKHIDMATAN][Pengurusan Atasan][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][91][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][91][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][91][KUMPULAN PERKHIDMATAN][Pelaksana][L]" value="0">
                            </td>
                            <td>
                                <input class="form-control p-1" type="number" name="questions[92][91][KUMPULAN PERKHIDMATAN][Pelaksana][P]" value="0">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Tindakan">
                                    <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                        <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                                                            <tr id="record-93">
                     <td class="row-index">
                        <span>93</span>
                     </td>
                    <td>
                        <input class="form-control p-1" type="text" name="questions[92][93][0]">
                    </td>
                    <td>
                        <input class="form-control p-1" type="text" name="questions[92][93][1]">
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="questions[92][93][2][]" class="custom-control-input" id="category-penerapan-93" value="Penerapan">
                            <label class="custom-control-label" for="category-penerapan-93">Penerapan</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="questions[92][93][2][]" class="custom-control-input" id="category-penghayatan-93" value="Penghayatan">
                            <label class="custom-control-label" for="category-penghayatan-93">Penghayatan</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="questions[92][93][2][]" class="custom-control-input" id="category-pengamalan-93" value="Pengamalan">
                            <label class="custom-control-label" for="category-pengamalan-93">Pengamalan</label>
                        </div>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="questions[92][93][3][]" class="custom-control-input" id="field-Kerohanian-93" value="Kerohanian">
                            <label class="custom-control-label" for="field-Kerohanian-93">Kerohanian</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="questions[92][93][3][]" class="custom-control-input" id="field-Integriti-93" value="Integriti">
                            <label class="custom-control-label" for="field-Integriti-93">Integriti</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="questions[92][93][3][]" class="custom-control-input" id="field-Psikologi-93" value="Psikologi">
                            <label class="custom-control-label" for="field-Psikologi-93">Psikologi</label>
                        </div>
                    </td>
                    <td class="auto-sum text-center"><span></span></td>

                    <td>
                        <input class="form-control p-1" type="number" name="questions[92][93][KUMPULAN PERKHIDMATAN][Pengurusan Tertinggi][L]">
                    </td>
                    <td>
                        <input class="form-control p-1" type="number" name="questions[92][93][KUMPULAN PERKHIDMATAN][Pengurusan Tertinggi][P]">
                    </td>
                    <td>
                        <input class="form-control p-1" type="number" name="questions[92][93][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][L]">
                    </td>
                    <td>
                        <input class="form-control p-1" type="number" name="questions[92][93][KUMPULAN PERKHIDMATAN][Pengurusan dan Profesional][P]">
                    </td>
                    <td>
                        <input class="form-control p-1" type="number" name="questions[92][93][KUMPULAN PERKHIDMATAN][Pelaksana][L]">
                    </td>
                    <td>
                        <input class="form-control p-1" type="number" name="questions[92][93][KUMPULAN PERKHIDMATAN][Pelaksana][P]">
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Tindakan">
                            <button class="btn btn-danger remove" type="button" data-question="92" data-trigger=".add-button-section-b" data-record-count="data-record-count-section-b">
                                <i class="fas fa-trash"></i> <span class="sr-only">Hapus</span>
                            </button>
                        </div>
                    </td>
                </tr></tbody>
    </table>
    <p class="text-muted"><b>Nota</b>: 6 jam = 1 hari</p>

    <button type="button" class="btn btn-success add-button-section-b" data-question="92" data-record-count-section-b="93" data-section="">
        <i class="fad fa-plus-square"></i> Tambah
    </button>
</div>

            </div><!--card-body-->
    
</div><!--card-->
                    </div><!--card-body-->
                <div class="card-footer text-right">
            <button type="submit" class="btn btn-lg btn-success text-uppercase">
                Simpan Rekod Amalan Nilai: BAHAGIAN B
            </button>
        </div>
</form>
</div>
