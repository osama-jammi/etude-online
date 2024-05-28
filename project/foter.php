

    
    <?php include('./footer.php') ?>

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
