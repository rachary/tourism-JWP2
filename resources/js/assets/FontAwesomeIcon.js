import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUser, faMapLocationDot, faBullhorn, faGear, faUserPlus, faUserGear, faTrash, faCalendarDay, faLocationArrow, faAsterisk, faMagnifyingGlass, faPhone, faEnvelope, faLocationDot } from '@fortawesome/free-solid-svg-icons'
import { faInstagram, faTwitter } from '@fortawesome/free-brands-svg-icons'
import { } from '@fortawesome/free-regular-svg-icons'

library.add( faUser, faMapLocationDot, faBullhorn, faGear, faUserPlus, faUserGear, faTrash, faCalendarDay, faLocationArrow, faAsterisk, faMagnifyingGlass, faPhone, faEnvelope, faInstagram, faTwitter, faLocationDot )

export default {
    install(app) {
        app.component('fa-icon', FontAwesomeIcon)
    }
}