import {Livewire} from '../../vendor/livewire/livewire/dist/livewire.esm';
import axios from 'axios'

window.axios = axios
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.nav = {
    width: 900,
    make() {
        return {
            collapsed: window.innerWidth < this.width,
            resize() {
                if (window.innerWidth < this.width) {
                    this.collapsed = true;
                }
            },
            click() {
                this.collapsed = !this.collapsed;
                if (!this.collapsed) {
                    this.$refs.body.classList.add("sidebar-open");
                } else {
                    this.$refs.body.classList.remove("sidebar-open");
                }
            },
            clickAway() {
                if (window.innerWidth < this.width) {
                    this.$refs.body.classList.remove("sidebar-open");
                    this.collapsed = true;
                }
            }
        };
    },
};

window.permissions = () => {
    return {
        checkAll(id, css) {
            document.getElementById(id).checked = Array.from(document.querySelectorAll('.' + css)).every((element) => {
                return element.checked === true
            });
        },
        reCheckedSelectAll(el, css) {
            let event = new Event('change');
            Array.from(document.querySelectorAll('.' + css)).forEach((element) => {
                element.checked = el.checked
                element.dispatchEvent(event);
            });
        }
    }
};

Livewire.start();
