<x-filament-support::modal id="filament-tiptap-editor-katex-modal"
                           heading="{{ __('filament-tiptap-editor::katex-modal.heading') }}"
                           width="md"
                           :dark-mode="config('filament.dark_mode')"
                           x-data="{
        toggleOpen(event) {
            $wire.set('fieldId', event.detail.fieldId);
            this.$nextTick(() => {
                if (this.isOpen === true && this.$el.querySelector('input')) {
                    this.$el.querySelector('input').focus();
                }
            });
        }
    }"
                           x-on:close-modal.window="$event.detail.id == 'filament-tiptap-editor-katex-modal' ? toggleOpen($event) : null"
                           x-on:open-modal.window="$event.detail.id == 'filament-tiptap-editor-katex-modal' ? toggleOpen($event) : null"
                           class="filament-tiptap-editor-katex-modal">

    <form wire:submit.prevent="create">
        {{ $this->form }}

        <div class="flex items-center gap-4 pt-3 mt-6 border-t border-gray-300 dark:border-gray-700">
            <div class="flex items-center gap-2 ml-auto">
                <x-filament::button type="button"
                                    x-on:click="isOpen = false; $wire.resetForm();"
                                    color="secondary">
                    {{ __('filament-tiptap-editor::katex-modal.buttons.cancel') }}
                </x-filament::button>
                <x-filament::button type="submit">
                    {{ __('filament-tiptap-editor::katex-modal.buttons.insert') }}
                </x-filament::button>
            </div>
        </div>
    </form>

</x-filament-support::modal>
