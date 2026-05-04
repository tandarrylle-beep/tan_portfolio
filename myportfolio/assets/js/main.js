/* =============================================
   DARRYLLE TAN — PORTFOLIO JS
   ============================================= */

/* === CUSTOM CURSOR === */
(function initCursor() {
  const dot  = document.createElement('div');
  const ring = document.createElement('div');
  dot.className  = 'cursor-dot';
  ring.className = 'cursor-ring';
  document.body.append(dot, ring);

  let mx = 0, my = 0, rx = 0, ry = 0;

  document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    dot.style.left  = mx + 'px';
    dot.style.top   = my + 'px';
  });

  (function animateRing() {
    rx += (mx - rx) * 0.12;
    ry += (my - ry) * 0.12;
    ring.style.left = rx + 'px';
    ring.style.top  = ry + 'px';
    requestAnimationFrame(animateRing);
  })();

  document.querySelectorAll('a, button, .project-card, .service-card, .skill-tag').forEach(el => {
    el.addEventListener('mouseenter', () => ring.classList.add('hover'));
    el.addEventListener('mouseleave', () => ring.classList.remove('hover'));
  });
})();

/* === INTERACTIVE PARTICLE BACKGROUND === */
(function initParticles() {
  const canvas = document.getElementById('bg-canvas');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  let W, H, particles = [], mouse = { x: -1000, y: -1000 };
  const PARTICLE_COUNT = 80;
  const ACCENT = { r: 0, g: 229, b: 160 };

  function resize() {
    W = canvas.width  = window.innerWidth;
    H = canvas.height = window.innerHeight;
  }
  resize();
  window.addEventListener('resize', resize);

  document.addEventListener('mousemove', e => {
    mouse.x = e.clientX;
    mouse.y = e.clientY + window.scrollY;
  });

  class Particle {
    constructor() { this.reset(true); }
    reset(initial) {
      this.x   = Math.random() * W;
      this.y   = initial ? Math.random() * H : H + 10;
      this.vy  = -(0.15 + Math.random() * 0.4);
      this.vx  = (Math.random() - 0.5) * 0.2;
      this.r   = 0.8 + Math.random() * 1.8;
      this.a   = 0.1 + Math.random() * 0.35;
      this.life = 0;
      this.maxLife = 400 + Math.random() * 400;
    }
    update() {
      this.life++;
      this.x += this.vx;
      this.y += this.vy;
      if (this.life > this.maxLife || this.y < -10) this.reset(false);
    }
    draw() {
      const pct = this.life / this.maxLife;
      const fade = pct < 0.1 ? pct / 0.1 : pct > 0.8 ? 1 - (pct - 0.8) / 0.2 : 1;
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(${ACCENT.r},${ACCENT.g},${ACCENT.b},${this.a * fade})`;
      ctx.fill();
    }
  }

  for (let i = 0; i < PARTICLE_COUNT; i++) particles.push(new Particle());

  // Connection lines
  function drawLines() {
    const scrollY = window.scrollY;
    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const d  = Math.sqrt(dx*dx + dy*dy);
        if (d < 120) {
          const a = (1 - d / 120) * 0.06;
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.strokeStyle = `rgba(${ACCENT.r},${ACCENT.g},${ACCENT.b},${a})`;
          ctx.lineWidth = 0.5;
          ctx.stroke();
        }
      }
      // Mouse interaction
      const my = mouse.y - scrollY;
      const dx = particles[i].x - mouse.x;
      const dy = particles[i].y - my;
      const d  = Math.sqrt(dx*dx + dy*dy);
      if (d < 160) {
        const a = (1 - d / 160) * 0.18;
        ctx.beginPath();
        ctx.moveTo(particles[i].x, particles[i].y);
        ctx.lineTo(mouse.x, my);
        ctx.strokeStyle = `rgba(${ACCENT.r},${ACCENT.g},${ACCENT.b},${a})`;
        ctx.lineWidth = 0.8;
        ctx.stroke();
      }
    }
  }

  function frame() {
    ctx.clearRect(0, 0, W, H);
    drawLines();
    particles.forEach(p => { p.update(); p.draw(); });
    requestAnimationFrame(frame);
  }
  frame();
})();

/* === NAVBAR === */
const navbar = document.getElementById('navbar');
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');

window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 60);
});

if (hamburger && mobileMenu) {
  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    mobileMenu.classList.toggle('open');
    document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
  });
  mobileMenu.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      hamburger.classList.remove('open');
      mobileMenu.classList.remove('open');
      document.body.style.overflow = '';
    });
  });
}

/* === REVEAL ON SCROLL === */
const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.classList.add('visible');
      revealObserver.unobserve(e.target);
    }
  });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

/* === STAT COUNTERS === */
const statObserver = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (!e.isIntersecting) return;
    const el = e.target;
    const target = parseInt(el.dataset.target);
    const suffix = el.dataset.suffix || '';
    const start = performance.now();
    const duration = 1800;
    (function step(now) {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.round(eased * target) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    })(start);
    statObserver.unobserve(el);
  });
}, { threshold: 0.5 });
document.querySelectorAll('.stat-num[data-target]').forEach(el => statObserver.observe(el));

/* === SKILL BARS === */
const barObserver = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (!e.isIntersecting) return;
    e.target.querySelectorAll('.skill-bar-fill').forEach(bar => {
      bar.style.width = bar.dataset.width + '%';
    });
    barObserver.unobserve(e.target);
  });
}, { threshold: 0.3 });
document.querySelectorAll('.skill-category-card').forEach(el => barObserver.observe(el));

/* === CONTACT FORM === */
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', e => {
    e.preventDefault();
    const btn = contactForm.querySelector('.btn-submit');
    const msg = document.getElementById('successMsg');
    btn.textContent = 'Sending...';
    btn.disabled = true;
    setTimeout(() => {
      msg.style.display = 'block';
      contactForm.reset();
      btn.textContent = 'Message Sent!';
      setTimeout(() => {
        btn.textContent = 'Send Message';
        btn.disabled = false;
        msg.style.display = 'none';
      }, 4000);
    }, 1200);
  });
}

/* === SMOOTH HOVER TILT (project cards) === */
document.querySelectorAll('.project-card').forEach(card => {
  card.addEventListener('mousemove', e => {
    const r = card.getBoundingClientRect();
    const x = (e.clientX - r.left) / r.width  - 0.5;
    const y = (e.clientY - r.top)  / r.height - 0.5;
    card.style.transform = `translateY(-6px) rotateX(${-y * 5}deg) rotateY(${x * 5}deg)`;
    card.style.transition = 'transform 0.1s';
  });
  card.addEventListener('mouseleave', () => {
    card.style.transform = '';
    card.style.transition = 'transform 0.5s cubic-bezier(0.34,1.56,0.64,1)';
  });
});

/* === TYPED HERO TEXT === */
(function initTyped() {
  const el = document.getElementById('typed-text');
  if (!el) return;
  const words = ['Freelancer', 'Developer', 'Designer', 'Problem Solver'];
  let wi = 0, ci = 0, deleting = false;

  function type() {
    const word = words[wi];
    if (!deleting) {
      el.textContent = word.slice(0, ++ci);
      if (ci === word.length) { deleting = true; setTimeout(type, 1800); return; }
    } else {
      el.textContent = word.slice(0, --ci);
      if (ci === 0) { deleting = false; wi = (wi + 1) % words.length; }
    }
    setTimeout(type, deleting ? 60 : 100);
  }
  setTimeout(type, 1000);
})();

/* === PAGE ACTIVE NAV HIGHLIGHT === */
const currentPage = window.location.pathname.split('/').pop() || 'index.php';
document.querySelectorAll('.nav-links a').forEach(a => {
  if (a.getAttribute('href') && a.getAttribute('href').includes(currentPage)) {
    a.classList.add('active');
  }
});
