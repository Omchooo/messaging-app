<div class="fixed bottom-14 right-0 mr-14" id="scrollButtonContainer">
    <button class="btn btn-circle btn-outline" id="scrollButton">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
        </svg>
    </button>
</div>

@push('scripts')
<script>
    scrollButtonContainer.style.display = 'none';

    window.addEventListener('scroll', function() {
      var scrollButtonContainer = document.getElementById('scrollButtonContainer');
      var scrollButton = document.getElementById('scrollButton');
      var scrollPosition = window.scrollY;

      if (scrollPosition > 300) {
        scrollButtonContainer.style.display = 'block';
      } else {
        scrollButtonContainer.style.display = 'none';
      }
    });

    var scrollButton = document.getElementById('scrollButton');
    scrollButton.addEventListener('click', function() {
      window.scroll({ top: 0, left: 0, behavior: 'smooth' });
    });
  </script>

@endpush
