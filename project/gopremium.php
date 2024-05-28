<?php include('./header.php') ?>
      <div>
        
      </div>
    </section>
    <section>
        <div class="banner-container ">
            <div class="banner">
                <div class="wrapper">
                    <div class="premium-header-left">
                        <h1>Go Premium</h1>
                        <h2>with Alison</h2>
                    </div>
                    <div class="premium-header-right ">  
                        <div class="head-section" style="
                        padding-right: 30px;
                    ">
                            <div class="monthly-title" style="
                            padding: 10px;
                            padding-left: 80px;
                        ">
                                <img src="./images/premium-crown.png" alt=""> Premium Monthly 
                            </div>
                            <div class="monthly-description" style="
                             padding: 10px;padding-left: 80px;
                        "> For just €7.99 per month, you get: </div>
                        <hr>
                            <div class="point"> 
                                <div class="point-title">
                                    Exclusive Monthly Discounts <i class="fa-solid fa-check"></i></div>
                                </div>   
                            <div class="point"><div class="point-title"> Your Discounts Never Expire<i class="fa-solid fa-check"></i></div></div>
                            <div class="point"><div class="point-title"> Up 50% Off Your Certification <i class="fa-solid fa-check"></i></div> </div>
                            <div class="point"><div class="point-title">Absolutely No Ads <i class="fa-solid fa-check"></i></div></div>

                            <a href="./shop.html" class="go-premium" style="margin-right: 60px;">Go Premium</a>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="social-share-container">
        <ul>
            <li><a href="https://www.instagram.com/etudes/?hl=ar"><i class="fa-regular fa-envelope"></i></a></li>
            <li><i class="fa-brands fa-facebook"></i></li>
            <li><i class="fa-brands fa-x-twitter"></i></li>
            <li><i class="fa-brands fa-linkedin"></i></li>
            <li><i class="fa-brands fa-whatsapp"></i></li>
        </ul>
    </div>
    <div>
        <h3>What is EduJam Premium Monthly?</h3>
        <p>You asked, we’ve listened. Over the years, many of our learners have given us suggestions for ways we could improve your learning journey on EduJam. Taking on board all those wonderful ideas from our worldwide community, we are proud and excited to introduce EduJam Premium Monthly, a brand new learning experience for EduJam learners.</p>
        <p>So what is Premium Monthly exactly? It’s the same EduJam you love, with over 1,000 free courses, but with absolutely no ads on courses or the entire Alison site. What’s more, Premium Monthly also gives you exclusive monthly discounts that you can use towards any Certificate or Diploma available to you. The discounts you receive will not expire, so you can redeem them whenever you want to. You can also save your discounts and get up to 50% off one Certificate or Diploma. The best part? You can cancel your subscription anytime!</p>
  
        
        <a href="./shop.html" class="go-premium" style="margin-right: 60px;">Go Premium</a>
    </div>

    
    <script src="script.js"></script>
    
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.facilities a.tab');

    tabs.forEach(tab => {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            console.log('Tab clicked:', this.getAttribute('href')); // Vérifiez l'URL du lien cliqué
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const exploreCourses1 = document.querySelector('.Explore_Courses1');
    const exploreCourses = document.querySelector('.Explore_courses');
    const Explore = document.querySelector('.Explore');

    if (exploreCourses1 && exploreCourses) {
        exploreCourses1.addEventListener('click', function (event) {
            event.preventDefault();

            
            if (exploreCourses.style.display === 'none') {
                exploreCourses.style.display = 'block';
                Explore.style.color = 'rgb(0 138 154)';
            } else {
                exploreCourses.style.display = 'none';
                Explore.style.color = '#000';
            }
        });
    }
});
</script>

<script>
    function toggleSearchContainaire() {
        var searchContainaire = document.querySelector('.search_containaire_cours');
        var getContainaire = document.querySelector('.get_containaire_cours');
        
        if (searchContainaire.style.display === 'none') {
            searchContainaire.style.display = 'block';
            getContainaire.style.width = '73%';
            getContainaire.style.marginLeft = '26%';
            
        } else {
            searchContainaire.style.display = 'none';
            getContainaire.style.width = '100%';
            getContainaire.style.marginLeft = '1%';
        }
    }
</script>
  </body>
</html>
