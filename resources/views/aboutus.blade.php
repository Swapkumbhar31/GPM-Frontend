@extends('layouts.app')

@section('content')
<div id="about-us-section-one">
  <div class="content container pt-3">
    <p class="text-center text-muted text-capitalize"
      data-aos="zoom-in"
      data-aos-delay="300">Know Us Better</p>
    <h1 class="text-center"
      data-aos="zoom-in"
      data-aos-delay="300">About Us</h1>
    <div class="text-center"
      data-aos="zoom-in"
      data-aos-delay="300">
      <img src="{{ asset('images/icons/general-icon/LINEIMG.png')}}"
        class="img-fluid  sm-img">
    </div>
    <h4 class="text-center thought"
      data-aos="fade-zoom-in"
      data-aos-delay="800">
      "To be born poor is not our fault, but to die poor is a crime."
    </h4>
    <h4 class="text-center name"
      data-aos="fade-zoom-in"
      data-aos-delay="800">
      - Bill gates
    </h4>
    <div class="para"
      data-aos="fade-zoom-in"
      data-aos-delay="1000">
      <div class="container mt-4 mb-5">
        <p class="text-justify">
          Nobody would like to die poor. Getting rich or being financial abundant should be a childhood right of everyone. Have you
          ever thought why few people are so rich that they can buy islands or cities? On the other hand, most of the worlds
          population struggle financially through out their lives?
        </p>
        <p class="text-justify">Everybody wants to be wealthy. While it is true that being financially abundant should be a birthright yet many of
          us continue to struggle for money. To understand this economic phenomenon, we at GPM Community have been researching
          since last
          <span class="number">10</span> years. </p>
        <p class="text-justify">Why rich is rich, middle class is middle class & poor is poor? We have been researching on this subject since list
          <span class="number">10</span> years and realised that there are some common habits among middle class & poor. The movement poor & middle
          class come out of these habits, they start upscaling their financial class.To make it easy to understand ‘Bad people
          are bad because of bad habits or they do bad things, the movement they improve their bad habits and stop doing
          bad things they will become good people’.People who struggle financially never realise that they do financial mistakes
          and the problem is that they are not aware that if they constantly improve on those mistakes they will start getting
          out of financial troubles and gradually improve their financial class.
        </p>
      </div>
    </div>
  </div>
</div>
<div id="about-us-section-two">
  <div class="content container">
    <h1 class="text-center mt-4 mb-4"
      data-aos="zoom-in"
      data-aos-delay="800">Frequently asked questions</h1>
    <div class="text-center"
      data-aos="zoom-in"
      data-aos-delay="800">
      <img src="images/icons/general-icon/LINEIMG.png"
        class="img-fluid  sm-img">
    </div>
    <div class="mt-5 mb-5"
      data-aos="fade-zoom-in"
      data-aos-delay="0">
      <h2 class="question">
        <u>What is GPM Community?</u>
      </h2>
      <p class="text-justify">We are GPM Community involved and focused on to teach financial literacy among masses
        with an aim to create awareness
        on financial mistakes people make. </p>
    </div>

    <div class="mt-5 mb-5"
      data-aos="fade-zoom-in"
      data-aos-delay="300">
      <h2 class="question success-title">
        <u>How does GPM Community work?</u>
      </h2>
      <p class="text-justify">We have been researching on financial literacy subject since last <span class="number">10</span>
        years and accordingly came up with a concrete
        plan of actions which can help anyone to upscale his financial class. We have designed step by step processes
        which
        are practical and easy to implement to move people from lower income category to higher income category </p>
    </div>
    <div class="mt-5 mb-0"
      data-aos="fade-zoom-in"
      data-aos-delay="600">
      <h2 class="question">
        <u>Why GPM community?</u>
      </h2>
      <p class="text-justify mb-0">People who struggle financially never realise that they do financial mistakes and
        the problem is that they are not
        aware that if they constantly improve on those mistakes they will start getting out of financial troubles and
        gradually
        improve their financial class.
      </p>
    </div>
  </div>
</div>

@endsection
