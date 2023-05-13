<div>
    <div class="fixed bottom-0 right-0 mb-14 mr-14" x-data="{ show: false }" x-init="window.addEventListener('scroll', () => { show = window.scrollY > 300 })">
        <button class="btn btn-circle btn-outline" x-show="show"
            @click="window.scroll({top: 0, left: 0, behavior: 'smooth'})">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
            </svg>
        </button>
    </div>
</div>
