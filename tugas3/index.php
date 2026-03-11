<?php
$conn = new mysqli("localhost", "root", "", "tugas3_kresnawan");
if ($conn->connect_error) {
    echo "Error connecting to database";
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];
    $stmt_del = $conn->prepare("DELETE FROM log_keuangan WHERE id = ?");
    $stmt_del->bind_param("i", $delete_id);

    if ($stmt_del->execute()) {
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

    $stmt_del->close();
}

if (isset($_POST["submit_form"])) {
    $jenis_transaksi = $_POST["jenis_transaksi"];
    $nominal = $_POST["nominal"];

    if ($jenis_transaksi == "") {
        $err_msg = "Jenis transaksi wajib diisi";
    } elseif ($nominal == "") {
        $err_msg = "Nominal wajib diisi";
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO log_keuangan (tipe, nominal) VALUES (?, ?)",
        );

        $stmt->bind_param("si", $jenis_transaksi, $nominal);

        if ($stmt->execute()) {
            echo "Data berhasil disimpan!";
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>255150400111034 - Kresnawan Restu Sanjaya - Tugas 3</title>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            body {
                margin: 20px;
            }

            .mt {
                margin-top: 10px;
            }

            .btn {
                padding: 5px 10px;
            }

            .inp {
                padding: 5px 10px;
            }

            .erase {
                padding: 5px 5px;
            }

            table {
                border-collapse: collapse;
                margin-top: 20px;
            }

            thead {
                background-color: lemonchiffon;
            }

            td {
                border: 1px solid black;
                padding: 4px 16px;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <h1>Tugas 3</h1>
        <p>Buat aplikasi untuk menampilkan dan menginsert data ke satu tabel menggunakan php.</p><br>

        <h1>Catatan Keuangan</h1>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tipe</td>
                    <td>Nominal</td>
                    <td>Tanggal</td>
                    <td>Opsi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("

                SELECT
                    id,
                    CASE
                        WHEN tipe = 'in' THEN '+'
                        WHEN tipe = 'out' THEN '-'
                        ELSE 'Tipe'
                    END AS tipe,
                    nominal,
                    tanggal

                FROM log_keuangan

                ");
                foreach ($result as $row) {
                    echo "<tr>";
                    foreach ($row as $column) {
                        echo "<td>" . $column . "</td>";
                    }

                    echo "
                        <td>
                        <a href='?delete_id=" .
                        $row["id"] .
                        "'>
                            <button class='erase'>
                                <i class='bi bi-trash'></i>
                            </button>
                        </a>
                        </td>
                    ";

                    echo "</tr>";
                }
                $result->close();
                ?>
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            <h3>Input transaksi</h3>
            <form style="margin-top: 10px;" method="post">
                <select class="inp mt" name="jenis_transaksi">
                    <option value="">-- Jenis transaksi --</option>
                    <option value="in">Pemasukan</option>
                    <option value="out">Pengeluaran</option>
                </select><br>
                <input type="number" name="nominal" class="inp mt" placeholder="Nominal transaksi.."><br>
                <?php if (isset($err_msg)) {
                    echo '<p style="color: red; font-size: 12px;">' .
                        $err_msg .
                        "</p>";
                } ?>
                <input type="submit" name="submit_form" class="btn mt">
            </form>
        </div>
        <div style="margin-top: 40px;">
            <h3>Nama: Kresnawan Restu Sanjaya</h3>
            <h3>NIM: 255150400111034</h3>
            <h3>Kelas: Pemrograman Web - A</h3>
        </div>
    </body>
</html>
