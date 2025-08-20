<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class ImageCarousel extends Component
{
    public $currentIndex = 0;
    public $images = [
        [
            'url' => 'https://images.unsplash.com/photo-1576091160399-112bc8fa638e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
            'title' => 'Wir sind gerne für Sie da!',
            'description' => 'Wir sind Inhabergeführt und legen großen Wert auf einen einfühlsamen und respektvollen Umgang mit unseren Kunden.',
            'alt' => 'Healthcare professional with elderly patient'
        ],
        [
            'url' => 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
            'title' => 'Professionelle Pflege',
            'description' => 'Unsere erfahrenen Pflegekräfte bieten Ihnen die beste Betreuung in Ihrem Zuhause.',
            'alt' => 'Professional caregiving'
        ],
        [
            'url' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
            'title' => '24/7 Unterstützung',
            'description' => 'Wir sind rund um die Uhr für Sie da und bieten flexible Betreuungszeiten.',
            'alt' => '24/7 support and care'
        ]
    ];

    public function mount()
    {
        $this->startAutoPlay();
    }

    public function next()
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->images);
    }

    public function previous()
    {
        $this->currentIndex = $this->currentIndex === 0 ? count($this->images) - 1 : $this->currentIndex - 1;
    }

    public function goToSlide($index)
    {
        $this->currentIndex = $index;
    }

    public function startAutoPlay()
    {
        $this->dispatch('startAutoPlay');
    }

    public function render()
    {
        return view('livewire.frontend.image-carousel');
    }
}

