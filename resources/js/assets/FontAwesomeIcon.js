import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUser, faMapLocationDot, faBullhorn, faGear, faUserPlus, faUserGear, faTrash, faCalendarDay, faLocationArrow } from '@fortawesome/free-solid-svg-icons'
import { } from '@fortawesome/free-regular-svg-icons'

library.add( faUser, faMapLocationDot, faBullhorn, faGear, faUserPlus, faUserGear, faTrash, faCalendarDay, faLocationArrow )

export default {
    install(app) {
        app.component('fa-icon', FontAwesomeIcon)
    }
}