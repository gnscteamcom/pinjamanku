<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Transaksi Pinjaman</title>
</head>

<body>
<form action="" method="post" name="form1" target="_self" id="form1">
  TRANSAKSI PINJAMAN
  <table width="600" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td bgcolor="#CCCCCC">TRANSAKSI</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>No. Penjualan</td>
      <td><input name="txtNoPenjualan" type="text" id="txtNoPenjualan" size="10" maxlength="5" /></td>
    </tr>
    <tr>
      <td>Tgl. Penjualan</td>
      <td><input name="txTanggal" type="text" id="txTanggal" value="<?php echo date('Y-m-d'); ?>" size="20" maxlength="10" /></td>
    </tr>
    <tr>
      <td>Pelanggan</td>
      <td><input name="txtPelanggan" type="text" id="txtPelanggan" size="60" maxlength="100" /></td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td><input name="txtKeterangan" type="text" id="txtKeterangan" size="60" maxlength="100" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">DATA BARANG</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Kategori</td>
      <td><select name="cmbKategori" id="cmbKategori">
      </select>
      <input type="submit" name="btnPilih" id="btnPilih" value="Pilih" /></td>
    </tr>
    <tr>
      <td>Nama Barang</td>
      <td><select name="cmbBarang" id="cmbBarang">
      </select></td>
    </tr>
    <tr>
      <td>Jumlah Jual</td>
      <td><input name="txtJumlah" type="text" id="txtJumlah" size="10" maxlength="4" />
      <input type="submit" name="btnTambah" id="btnTambah" value="Tambah" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSimpan" id="btnSimpan" value="Simpan Transaksi" /></td>
    </tr>
  </table>
  <p>DATA PINJAMAN</p>
  <table width="600" border="1" cellspacing="0" cellpadding="1">
    <tr>
      <td bgcolor="#CCCCCC">Kode</td>
      <td bgcolor="#CCCCCC">Nama</td>
      <td bgcolor="#CCCCCC">Jumlah</td>
      <td bgcolor="#CCCCCC">Harga(Rp)</td>
      <td bgcolor="#CCCCCC">Subtotal(Rp)</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>