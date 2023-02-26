import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUser, faMapLocationDot, faBullhorn, faGear, faUserPlus, faUserGear, faTrash, faCalendarDay, faLocationArrow, faAsterisk, faMagnifyingGlass } from '@fortawesome/free-solid-svg-icons'
import { } from '@fortawesome/free-regular-svg-icons'

library.add( faUser, faMapLocationDot, faBullhorn, faGear, faUserPlus, faUserGear, faTrash, faCalendarDay, faLocationArrow, faAsterisk, faMagnifyingGlass )

export default {
    install(app) {
        app.component('fa-icon', FontAwesomeIcon)
    }
}