// Hero Background Animation - Concept C′: Rolling Hills Horizon
// 3D landscape with rolling waves, viewed from a low camera pitch

(function() {
  const DOT_COLOR = [120, 120, 120]; // #6547FE as RGB
  
  function initHeroBackground() {
    const canvas = document.getElementById('hero-bg-canvas');
    if (!canvas) return;

    function setupCanvas() {
      const dpr = Math.min(window.devicePixelRatio || 1, 2);
      const w = canvas.clientWidth;
      const h = canvas.clientHeight;
      canvas.width = w * dpr;
      canvas.height = h * dpr;
      const ctx = canvas.getContext('2d');
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      return { ctx, w, h };
    }

    let { ctx, w, h } = setupCanvas();
    let raf, t0;

    // Camera & projection
    const FOCAL = 700;
    const CAM_HEIGHT = 350;
    const PITCH = 0.2; // ~13° downward — angled more from above
    const cosP = Math.cos(PITCH);
    const sinP = Math.sin(PITCH);

    // Grid extents (in world units)
    const NEAR = 350;
    const FAR = 2300;
    const SPACING_X = 30;
    const SPACING_Z = 38;

    const BASE_R = 2;
    const PERSP_MAX = 2.5;

    const draw = (t) => {
      ctx.clearRect(0, 0, w, h);
      const cx = w / 2;
      const cy = h / 2;

      const numRows = Math.ceil((FAR - NEAR) / SPACING_Z);

      for (let j = 0; j < numRows; j++) {
        const gz = NEAR + j * SPACING_Z;

        // Per-row x range: only generate cols that can land on screen
        const approxZCam = CAM_HEIGHT * sinP + gz * cosP;
        const halfRange = (Math.max(cx, w - cx) + 80) * approxZCam / FOCAL;
        const numCols = Math.ceil((halfRange * 2) / SPACING_X);
        const xStart = -halfRange;

        for (let i = 0; i < numCols; i++) {
          const gx = xStart + i * SPACING_X;

          // Rolling-hill height — three layered traveling waves
          const wy =
            Math.sin(gx * 0.0042 + t * 0.27) * 40 +
            Math.sin(gz * 0.0033 + t * 0.19) * 46 +
            Math.sin((gx * 0.55 + gz) * 0.0026 + t * 0.13) * 54;

          // Translate to camera, rotate by pitch, project
          const ty = wy - CAM_HEIGHT;
          const yCam = ty * cosP + gz * sinP;
          const zCam = -ty * sinP + gz * cosP;
          if (zCam < 1) continue;

          const persp = FOCAL / zCam;
          const sx = gx * persp + cx;
          const sy = -yCam * persp + cy;
          if (sx < -8 || sx > w + 8 || sy < -8 || sy > h + 8) continue;

          // Horizon fade — squared falloff for smooth dissolve
          const distFrac = (gz - NEAR) / (FAR - NEAR);
          const fade = Math.max(0, Math.min(1, (1 - distFrac) * 1.3));
          const fadeCurve = fade * fade;
          if (fadeCurve < 0.005) continue;

          const r = BASE_R * Math.min(persp, PERSP_MAX);
          const alpha = 0.42 * fadeCurve;

          ctx.fillStyle = `rgba(${DOT_COLOR[0]},${DOT_COLOR[1]},${DOT_COLOR[2]},${alpha.toFixed(3)})`;
          ctx.beginPath();
          ctx.arc(sx, sy, r, 0, Math.PI * 2);
          ctx.fill();
        }
      }
    };

    const loop = (ts) => {
      raf = requestAnimationFrame(loop);
      if (!t0) t0 = ts;
      draw((ts - t0) * 0.001);
    };

    raf = requestAnimationFrame(loop);

    const onResize = () => {
      ({ ctx, w, h } = setupCanvas());
    };

    window.addEventListener('resize', onResize);

    return () => {
      cancelAnimationFrame(raf);
      window.removeEventListener('resize', onResize);
      ctx.clearRect(0, 0, w, h);
    };
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHeroBackground);
  } else {
    initHeroBackground();
  }
})();
