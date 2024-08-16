<?php

function is_logged_operator()
{
    $ci = get_instance();
    $operator = 'operator';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $operator) {
        redirect('dashboard/not_found');
    }
}
function is_logged_sekretaris()
{
    $ci = get_instance();
    $sekretaris = 'Sekretaris';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $sekretaris) {
        redirect('dashboard/not_found');
    }
}
function is_logged_IntrukturMadya()
{
    $ci = get_instance();
    $IntrukturMadya = 'IntrukturMadya';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $IntrukturMadya) {
        redirect('dashboard/not_found');
    }
}
function is_logged_IntrukturMuda()
{
    $ci = get_instance();
    $IntrukturMuda = 'IntrukturMuda';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $IntrukturMuda) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaDinasKoperasiUsahaMikrodanTenagaKerja()
{
    $ci = get_instance();
    $KepalaDinasKoperasiUsahaMikrodanTenagaKerja = 'KepalaDinasKoperasiUsahaMikrodanTenagaKerja';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaDinasKoperasiUsahaMikrodanTenagaKerja) {
        redirect('dashboard/not_found');
    }
}
function is_logged_MediatorHubunganIndustrialMadya()
{
    $ci = get_instance();
    $MediatorHubunganIndustrialMadya = 'MediatorHubunganIndustrialMadya';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $MediatorHubunganIndustrialMadya) {
        redirect('dashboard/not_found');
    }
}
function is_logged_PengawasKoperasiMadya()
{
    $ci = get_instance();
    $PengawasKoperasiMadya = 'PengawasKoperasiMadya';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $PengawasKoperasiMadya) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaSubBagianKeuangan()
{
    $ci = get_instance();
    $KepalaSubBagianKeuangan = 'KepalaSubBagianKeuangan';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaSubBagianKeuangan) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaSubBagianPerencaan()
{
    $ci = get_instance();
    $KepalaSubBagianPerencaan = 'KepalaSubBagianPerencaan';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaSubBagianPerencaan) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaSubBagianmumdanKepegawaian()
{
    $ci = get_instance();
    $KepalaSubBagianmumdanKepegawaian = 'KepalaSubBagianmumdanKepegawaian';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaSubBagianmumdanKepegawaian) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaBidangUsahaMikro()
{
    $ci = get_instance();
    $KepalaBidangUsahaMikro = 'KepalaBidangUsahaMikro';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaBidangUsahaMikro) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaBidangKoperasi()
{
    $ci = get_instance();
    $KepalaBidangKoperasi = 'KepalaBidangKoperasi';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaBidangKoperasi) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaBidangPembinaanPelatihandanPenempatanKerja()
{
    $ci = get_instance();
    $KepalaBidangPembinaanPelatihandanPenempatanKerja = 'KepalaBidangPembinaanPelatihandanPenempatanKerja';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaBidangPembinaanPelatihandanPenempatanKerja) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial()
{
    $ci = get_instance();
    $KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial = 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaUPTBLK()
{
    $ci = get_instance();
    $KepalaUPTBLK = 'KepalaUPTBLK';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaUPTBLK) {
        redirect('dashboard/not_found');
    }
}
function is_logged_KepalaSubBagianTataUsahaUPTBLK()
{
    $ci = get_instance();
    $KepalaSubBagianTataUsahaUPTBLK = 'KepalaSubBagianTataUsahaUPTBLK';

    if (!$ci->session->userdata('email')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $KepalaSubBagianTataUsahaUPTBLK) {
        redirect('dashboard/not_found');
    }
}

function is_logged_FrontOffice()
{
    $ci = get_instance();
    $FrontOffice = 'FrontOffice';

    if (!$ci->session->userdata('id')) {
        redirect('dashboard/not_found');
    } else if ($ci->session->userdata('role_id') != $FrontOffice) {
        redirect('dashboard/not_found');
    
    }
}

function is_session()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('home/not_found');
    }
}
