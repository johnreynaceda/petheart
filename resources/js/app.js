import "./bootstrap";

import Alpine from "alpinejs";
import Focus from "@alpinejs/focus";
import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
import NotificationsAlpinePlugin from "../../vendor/filament/notifications/dist/module.esm";
import persist from "@alpinejs/persist";

Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.plugin(Focus);
Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(NotificationsAlpinePlugin);

Alpine.start();
