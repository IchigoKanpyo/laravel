import Vue from "vue";
import index from "./src/index.vue";
import VueTailwind from "vue-tailwind";
import {
    TInput,
    TTextarea,
    TSelect,
    TRadio,
    TCheckbox,
    TButton,
    TInputGroup,
    TCard,
    TAlert,
    TModal,
    TDropdown,
    TRichSelect,
    TPagination,
    TTag,
    TRadioGroup,
    TCheckboxGroup,
    TTable,
    TDatepicker,
    TToggle,
    TDialog,
} from "vue-tailwind/dist/components";
const components = {
    "t-select": {
        component: TRichSelect,
    },
    "t-input": {
        component: TInput,
    },
};

Vue.use(VueTailwind, components);
new Vue({
    el: "#app",
    components: { index },
});
