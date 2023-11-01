<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link href="welcome/css/styles.css" rel="stylesheet" />
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Proyek 3</h2>
            </div>

            <div class="menu">
                <ul class>
                    <li><a href="aboutweb">ABOUT</a></li>
                    <li><a href="cv">CV</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <h2 ><strong>List CV</strong></h2>
            <table class="table table-stripped">
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($data as $item)
                    <tr>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="" width="100"></td>
                        <td class="nama">{{ $item->nama }}</td>
                        <td>
                            <a href="{{ route('cv.show', ['cv' => $item->id]) }}" class="btn btn-primary btn-lg">Lihat</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>