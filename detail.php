<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php
    include("layout/navbar.php");
    ?>


    <section id="detail-product">
        <img src="assets/lapangan.png" alt="">
        <div class="detail">

            <div class="text">
                <div class="title">Lorem Ipsum</div>
                <div class="subtitle">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores nesciunt
                    blanditiis mollitia totam odio voluptates repellendus facere, maxime at fuga?</div>
            </div>

            <ul>Feature
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
            </ul>

            <div class="price">
                Rp 60,000 / Jam
            </div>

        </div>

    </section>

    <section id="reservasi">

        <div>
            <div class="input-form">
                <p>Nama</p>
                <input type="text">
            </div>

            <div class="input-form">
                <p>No. Hp</p>
                <input type="text">
            </div>

            <div class="divide-input">
                <div class="input-form">
                    <p>Check-in</p>
                    <input type="datetime-local">
                </div>
                <div class="input-form">
                    <p>Check-out</p>
                    <input type="datetime-local">
                </div>
            </div>
            <div class="input-form">
                <p>Deskripsi</p>
                <textarea name="" id=""  rows="10" class="deskripsi"></textarea>
            </div>
       
            <div class="input-form">
                <button>Submit</button>
            </div>
            

        </div>

        <img src="assets/soccer.png" alt="">


    </section>

    <?php
    include("layout/footer.php");
    ?>


</body>

</html>