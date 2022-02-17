<?php
class Flasher
{
  public static function setFlash($pesan, $aksi, $tipe, $page)
  {
    $_SESSION['flash'] = [
      'pesan' => $pesan,
      'aksi' => $aksi,
      'tipe' => $tipe,
      'page' => $page
    ];
  }

  public static function flash()
  {
    if (isset($_SESSION['flash'])) {
      echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">Data ' . $_SESSION['flash']['page'] . $_SESSION['flash']['pesan'] . ' <strong>' . $_SESSION['flash']['aksi'] . '</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
      unset($_SESSION['flash']);
    }
  }

  // public function flash()
  // {
  //   if (isset($_SESSION['flash'])) {
  //     //     echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">Data ' . $_SESSION['flash']['page'] . $_SESSION['flash']['pesan'] . ' <strong>' . $_SESSION['flash']['aksi'] . '</strong>
  //     //           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //     //             <span aria-hidden="true">&times;</span>
  //     //           </button>
  //     //         </div>';
  //     //     unset($_SESSION['flash']);
  //     //   }
  //     echo "<script>
  //       Swal.fire({
  //       position: 'center',
  //       icon: " . $_SESSION['flash']['tipe'] . ",
  //       title: 'Data '" . $_SESSION['flash']['Page'] . ' ' . $_SESSION['flash']['Page'] . ' ' . $_SESSION['flash']['aksi'] . ",
  //       showConfirmButton: false,
  //       timer: 1500
  //     })
  //     </script>";
  //   }
  // }
}
