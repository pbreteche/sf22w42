import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['content']

    toggle() {
        const collapsableElt = this.contentTarget.querySelectorAll('[data-collapsable]')

        this.contentTarget.collapsed =
            this.contentTarget.collapsed ?
                !this.contentTarget.collapsed : true

        for (const elt of collapsableElt) {
            elt.hidden = this.contentTarget.collapsed
        }
    }
}
