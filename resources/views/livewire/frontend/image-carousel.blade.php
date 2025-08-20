<div class="relative w-full h-screen overflow-hidden" id="imageCarousel">
    <!-- Navigation Arrows -->
    <button 
        wire:click="previous"
        class="absolute left-4 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-blue-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110"
        onmouseenter="stopAutoPlay()"
        onmouseleave="startAutoPlay()"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <button 
        wire:click="next"
        class="absolute right-4 top-1/2 transform -translate-y-1/2 z-10 bg-white/80 hover:bg-white text-blue-800 p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110"
        onmouseenter="stopAutoPlay()"
        onmouseleave="startAutoPlay()"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <!-- Image Container -->
    <div class="relative w-full h-full">
        @foreach($images as $index => $image)
            <div 
                class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === $currentIndex ? 'opacity-100' : 'opacity-0' }}"
                style="background-image: url('{{ $image['url'] }}'); background-size: cover; background-position: center;"
            >
                <!-- Overlay for better text readability -->
                <div class="absolute inset-0 bg-black/20"></div>
                
                <!-- Content -->
                <div class="relative z-10 flex items-center h-full">
                    <div class="container mx-auto px-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                            <!-- Text Content -->
                            <div class="text-white space-y-6">
                                <h1 class="text-5xl lg:text-6xl font-bold leading-tight">
                                    {{ $image['title'] }}
                                </h1>
                                <p class="text-xl lg:text-2xl leading-relaxed opacity-90">
                                    {{ $image['description'] }}
                                </p>
                                <div class="pt-4">
                                    <button class="bg-teal-500 hover:bg-teal-600 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors duration-300 transform hover:scale-105">
                                        Mehr erfahren
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Image Placeholder (hidden on mobile) -->
                            <div class="hidden lg:block">
                                <!-- This space is intentionally left empty as the background image covers the entire slide -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Dots Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 flex space-x-3">
        @foreach($images as $index => $image)
            <button 
                wire:click="goToSlide({{ $index }})"
                class="w-3 h-3 rounded-full transition-all duration-300 {{ $index === $currentIndex ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/75' }}"
                onmouseenter="stopAutoPlay()"
                onmouseleave="startAutoPlay()"
            ></button>
        @endforeach
    </div>

    <!-- Progress Bar -->
    <div class="absolute bottom-0 left-0 w-full h-1 bg-white/20">
        <div 
            class="h-full bg-teal-500 transition-all duration-1000 ease-linear"
            style="width: {{ (($currentIndex + 1) / count($images)) * 100 }}%"
        ></div>
    </div>
</div>

<script>
let autoPlayInterval;

function startAutoPlay() {
    if (!autoPlayInterval) {
        autoPlayInterval = setInterval(() => {
            @this.next();
        }, 5000);
    }
}

function stopAutoPlay() {
    if (autoPlayInterval) {
        clearInterval(autoPlayInterval);
        autoPlayInterval = null;
    }
}

// Start auto-play when component loads
document.addEventListener('DOMContentLoaded', function() {
    startAutoPlay();
});

// Listen for Livewire events
document.addEventListener('livewire:init', () => {
    Livewire.on('startAutoPlay', () => {
        startAutoPlay();
    });
    
    Livewire.on('stopAutoPlay', () => {
        stopAutoPlay();
    });
    
    Livewire.on('resumeAutoPlay', () => {
        startAutoPlay();
    });
});
</script>

