<?php
/**
 * SVG Decorative Shapes
 * Ported from React decorations/Shapes.tsx
 */

function renderFloatingShape1($className = '') {
    return '<svg class="' . $className . '" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 0C155.228 0 200 44.772 200 100C200 155.228 155.228 200 100 200C44.772 200 0 155.228 0 100C0 44.772 44.772 0 100 0Z" fill="url(#paint0_linear)" fill-opacity="0.1"/>
        <defs>
            <linearGradient id="paint0_linear" x1="0" y1="0" x2="200" y2="200" gradientUnits="userSpaceOnUse">
                <stop stop-color="hsl(42, 80%, 55%)"/>
                <stop offset="1" stop-color="hsl(158, 45%, 22%)"/>
            </linearGradient>
        </defs>
    </svg>';
}

function renderFloatingShape2($className = '') {
    return '<svg class="' . $className . '" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M150 0C232.843 0 300 67.157 300 150C300 232.843 232.843 300 150 300C67.157 300 0 232.843 0 150C0 67.157 67.157 0 150 0Z" fill="url(#paint1_linear)" fill-opacity="0.08"/>
        <ellipse cx="150" cy="150" rx="100" ry="100" fill="url(#paint2_linear)" fill-opacity="0.05"/>
        <defs>
            <linearGradient id="paint1_linear" x1="0" y1="0" x2="300" y2="300" gradientUnits="userSpaceOnUse">
                <stop stop-color="hsl(158, 45%, 22%)"/>
                <stop offset="1" stop-color="hsl(42, 80%, 55%)"/>
            </linearGradient>
            <linearGradient id="paint2_linear" x1="50" y1="50" x2="250" y2="250" gradientUnits="userSpaceOnUse">
                <stop stop-color="hsl(42, 80%, 55%)"/>
                <stop offset="1" stop-color="hsl(158, 45%, 22%)"/>
            </linearGradient>
        </defs>
    </svg>';
}

function renderLeafDecoration($className = '') {
    return '<svg class="' . $className . '" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M50 5C50 5 85 25 85 55C85 85 50 95 50 95C50 95 15 85 15 55C15 25 50 5 50 5Z" stroke="hsl(158, 45%, 22%)" stroke-width="2" stroke-opacity="0.3" fill="none"/>
        <path d="M50 20C50 20 70 35 70 55C70 75 50 85 50 85" stroke="hsl(42, 80%, 55%)" stroke-width="1.5" stroke-opacity="0.4" fill="none"/>
    </svg>';
}

function renderTentIcon($className = '') {
    return '<svg class="' . $className . '" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M32 8L56 52H8L32 8Z" stroke="currentColor" stroke-width="2" fill="none"/>
        <path d="M32 8L32 52" stroke="currentColor" stroke-width="1.5" stroke-opacity="0.5"/>
        <path d="M26 52V40C26 36.6863 28.6863 34 32 34C35.3137 34 38 36.6863 38 40V52" stroke="currentColor" stroke-width="2"/>
    </svg>';
}

function renderWaveBottomShape($fillColor = 'hsl(45, 30%, 97%)') {
    return '<svg class="position-absolute bottom-0 start-0 end-0" style="height: 80px; width: 100%;" viewBox="0 0 1440 80" fill="none" preserveAspectRatio="none">
        <path d="M0,40 C480,80 960,0 1440,40 L1440,80 L0,80 Z" fill="' . $fillColor . '"/>
    </svg>';
}

function renderHeroWaveShape($fillColor = 'hsl(45, 30%, 97%)') {
    return '<svg class="position-absolute bottom-0 start-0 end-0" style="height: 96px; width: 100%;" viewBox="0 0 1440 100" fill="none" preserveAspectRatio="none">
        <path d="M0,50 C360,100 1080,0 1440,50 L1440,100 L0,100 Z" fill="' . $fillColor . '"/>
    </svg>';
}
