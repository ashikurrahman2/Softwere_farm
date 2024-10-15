{{-- List toogle about desctiption script --}}
<script>
    document.querySelectorAll('.toggle-detail').forEach(item => {
     item.addEventListener('click', function(e) {
         e.preventDefault();
         const detailContent = this.nextElementSibling;
 
         // Toggle the visibility of the detail content
         if (detailContent.style.display === 'none') {
             detailContent.style.display = 'block';
         } else {
             detailContent.style.display = 'none';
         }
     });
 });
 </script>