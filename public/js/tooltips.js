$(() => {
  new jBox('Tooltip', {
    attach: '#btn-brief',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar brief (PDF)'
  });

  new jBox('Tooltip', {
    attach: '#btn-audio',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar audio (MP4)'
  });

  new jBox('Tooltip', {
    attach: '#btn-visual',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar key visual (ZIP)'
  });

  new jBox('Tooltip', {
    attach: '#btn-whole',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar kit completo (ZIP)'
  });

  new jBox('Tooltip', {
    attach: '#btn-refresh',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Actualizar listado de equipos'
  });
});
