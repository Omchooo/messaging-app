<div x-data="{
    loading: false,
    observe() {
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.loading = true;
                    @this.call('loadMore')
                        .then(() => {
                            this.loading = false;
                        });
                }
            })
        }, {
            root: null
        })

        observer.observe(this.$el)
    }
}" x-init="observe">
    <button class="btn loading w-full" x-bind:class="{ 'hidden': !loading }">loading</button>
</div>
