<?php
// includes/helpers.php — Shared helper functions

function serviceIcon(string $icon): string {
    $map = [
        'code'     => '<svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
        'mobile'   => '<svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/><circle cx="12" cy="17" r="1" fill="currentColor" stroke="none"/></svg>',
        'design'   => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>',
        'ai'       => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>',
        'database' => '<svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>',
        'gis'      => '<svg viewBox="0 0 24 24"><circle cx="12" cy="10" r="3"/><path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 10-16 0c0 3 2.7 6.9 8 11.7z"/></svg>',
        'excel'    => '<svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
    ];
    return $map[$icon] ?? $map['code'];
}

function projectIcon(string $type, string $color): string {
    $t = strtolower($type);
    if (str_contains($t,'ai') || str_contains($t,'ml')) {
        return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round" width="30" height="30"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>';
    } elseif (str_contains($t,'mobile') || str_contains($t,'app')) {
        return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round" width="30" height="30"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="9" y1="7" x2="15" y2="7"/></svg>';
    } elseif (str_contains($t,'database') || str_contains($t,'sql')) {
        return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round" width="30" height="30"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>';
    } elseif (str_contains($t,'gis')) {
        return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round" width="30" height="30"><circle cx="12" cy="10" r="3"/><path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 10-16 0c0 3 2.7 6.9 8 11.7z"/></svg>';
    }
    return '<svg viewBox="0 0 24 24" stroke="'.$color.'" fill="none" stroke-width="1.6" stroke-linecap="round" width="30" height="30"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>';
}
