@extends('layouts.Acceuill')
@section('content')
    <section class="articl1">
        <div class="p1">
            <h1><i class="ri-attachment-line"></i> À propos de nous</h1>
            <p><strong>Lycée Moulay ismail</strong>"
                Fondé sur des valeurs d'excellence académique, d'innovation et d'inclusion,
                notre lycée offre un environnement d'apprentissage stimulant et enrichissant
                pour chaque élève. Avec un corps professoral dévoué et expérimenté, des
                installations modernes et des programmes éducatifs diversifiés, nous nous
                engageons à fournir une éducation de qualité qui prépare nos étudiants à réussir
                dans un monde en constante évolution. Notre lycée vise à inspirer la curiosité intellectuelle,
                à favoriser le développement personnel et à cultiver des citoyens responsables et engagés.
                Nous sommes fiers de notre héritage et de notre communauté dynamique, et nous sommes impatients
                de partager avec vous tout ce que notre lycée a à offrir.
            <h4> Localisation: Driouch - Maroc <i class="ri-map-pin-range-fill"></i></h4>
            <h4>Année d'ouverture: 01-01-2000 <i class="ri-calendar-schedule-fill"></i></h4>
            </p>
            <a href="{{ route('accueil') }}">Accueil <i class="ri-home-3-line"></i> </a>

        </div>

        <div class="p2">
            <img src="{{ asset('images/Purple & Yellow Minimal School Admission Facebook Post (1).jpg') }}"
                alt="Description de l'image">
        </div>
    </section>



    <section class="slide">
        <h1>Exploration Visuelle</h1>
        <p>Explorez notre lycée à travers des moments capturés en images</p>
        <div class="wrapper">
            <i id="left" class="ri-arrow-left-s-line"></i>
            <div class="carousel">
                <img src="images/269885572_427831775715842_3003663538937367989_n.jpeg" alt="img" draggable="false">
                <img src="images/253859420_397013705464316_8809724315648159396_n.jpeg" alt="img" draggable="false">
                <img src="images/244537636_375378307627856_1269251700359181826_n.jpeg" alt="img" draggable="false">
                <img src="images/277778883_389967766466286_8547034403029128305_n.jpeg" alt="img" draggable="false">
                <img src="images/269598944_427832089049144_2516702295568106996_n.jpeg" alt="img" draggable="false">
                <img src="images/244450771_375378944294459_7198891489275396272_n.jpeg" alt="img" draggable="false">
                <img src="images/PHOTO-2024-04-19-18-30-49.jpg" alt="img" draggable="false">
                <img src="images/270013764_427831915715828_6359339326940119472_n.jpeg" alt="img" draggable="false">
                <img src="images/269611737_427831815715838_1603714381976731170_n.jpeg" alt="img" draggable="false">
            </div>
            <i id="right" class="ri-arrow-right-s-line"></i>
        </div>
    </section>

    <section class="map_section">
        <h1>Notre Emplacement</h1>
        <p>Découvrez l'emplacement de notre lycée dans la communauté locale</p>
        <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3269.4199612441193!2d-3.3921869753247855!3d34.97114406865483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7642c18db3ccb7%3A0xfea1c5ab108af126!2z2KvYp9mG2YjZitipINmF2YjZhNin2Yog2KfYs9mF2KfYudmK2YQ!5e0!3m2!1sar!2sma!4v1713117795992!5m2!1sar!2sma"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
<link rel="stylesheet" href="{{ asset('css/About.css') }}">
<script src="js/About.js"></script>
