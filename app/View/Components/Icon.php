<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class Icon
 *
 * @package App\View\Components
 * @suppressWarnings(PHPMD)
 */
class Icon extends Component
{
    public function __construct(
        $academicCap = null,
        $archive = null,
        $badgeCheck = null,
        $bell = null,
        $calendar = null,
        $cash = null,
        $checkCircle = null,
        $clock = null,
        $home = null,
        $menuAlt1 = null,
        $receiptRefund = null,
        $searchCircle = null,
        $speakerphone = null,
        $trash = null,
        $userGroup = null,
        $users = null,
        $viewList = null,
        $warning = null,
        $x = null,
        $xCircle = null,
        $arrowRight = null,
        $cog = null,
        $filter = null,
        $eye = null,
        $eyeOff = null,
        $review = null,
        $documentDuplicate = null,
        $documentText = null,
        $questionCircle = null,
        $selector = null,
        $check = null,
        $refresh = null,
        $loading = null,
        $pencil = null,
        $chevronUp = null,
        $chevronDown = null,
        $lockClosed = null,
        $docDownload = null,
        public ?string $icon = null,
        public $outline = null
    ) {
        if ($academicCap) {
            $this->icon = 'academic-cap';
        }

        if ($archive) {
            $this->icon = 'archive';
        }
        if ($badgeCheck) {
            $this->icon = 'badge-check';
        }
        if ($bell) {
            $this->icon = 'bell';
        }
        if ($calendar) {
            $this->icon = 'calendar';
        }
        if ($cash) {
            $this->icon = 'cash';
        }
        if ($checkCircle) {
            $this->icon = 'check-circle';
        }
        if ($clock) {
            $this->icon = 'clock';
        }
        if ($home) {
            $this->icon = 'home';
        }
        if ($menuAlt1) {
            $this->icon = 'menu-alt-1';
        }
        if ($receiptRefund) {
            $this->icon = 'receipt-refund';
        }
        if ($searchCircle) {
            $this->icon = 'search-circle';
        }
        if ($speakerphone) {
            $this->icon = 'speakerphone';
        }
        if ($trash) {
            $this->icon = 'trash';
        }
        if ($userGroup) {
            $this->icon = 'user-group';
        }
        if ($users) {
            $this->icon = 'users';
        }
        if ($viewList) {
            $this->icon = 'view-list';
        }
        if ($warning) {
            $this->icon = 'warning';
        }
        if ($x) {
            $this->icon = 'x';
        }
        if ($xCircle) {
            $this->icon = 'x-circle';
        }
        if ($arrowRight) {
            $this->icon = 'arrow-right';
        }
        if ($cog) {
            $this->icon = 'cog';
        }
        if ($filter) {
            $this->icon = 'filter';
        }
        if ($eye) {
            $this->icon = 'eye';
        }
        if ($eyeOff) {
            $this->icon = 'eye-off';
        }
        if ($review) {
            $this->icon = 'review';
        }
        if ($documentDuplicate) {
            $this->icon = 'document-duplicate';
        }
        if ($documentText) {
            $this->icon = 'document-text';
        }
        if ($questionCircle) {
            $this->icon = 'question-circle';
        }
        if ($selector) {
            $this->icon = 'selector';
        }
        if ($check) {
            $this->icon = 'check';
        }
        if ($refresh) {
            $this->icon = 'refresh';
        }
        if ($loading) {
            $this->icon = 'loading';
        }
        if ($pencil) {
            $this->icon = 'pencil';
        }
        if ($chevronUp) {
            $this->icon = 'chevron-up';
        }
        if ($chevronDown) {
            $this->icon = 'chevron-down';
        }
        if ($lockClosed) {
            $this->icon = 'lock-closed';
        }
        if ($docDownload) {
            $this->icon = 'doc-download';
        }
    }

    public function render(): View
    {
        return view('components.icons.' . $this->icon);
    }
}
