import axios from 'axios'

axios.defaults.withCredentials = true

const config = {
  baseURL: import.meta.env.VITE_BASE_API,
  timeout: 30000, // 30s
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
    'X-Requested-With': 'XMLHttpRequest',
    'Accept-Language': 'id',
  },
}

const REQUEST = (conf) => {
  return new Promise(async (resolve, reject) => {
    try {
      const response = await axios.request({ ...config, ...conf })
      resolve(response.data)
    } catch (error) {
      handleErrors(error)
      reject(error)
    }
  })
}
const GET = (url, params = {}) => {
  return REQUEST({ method: 'get', url, params })
}
const POST = (url, data) => {
  return REQUEST({ method: 'post', url, data })
}
const PUT = (url, data) => {
  return REQUEST({ method: 'put', url, data })
}
const DELETE = (url, data = {}) => {
  return REQUEST({ method: 'delete', url, data })
}
const POSTFORMDATA = (url, data) => {
  // const formData = new FormData()
  // Object.keys(data).forEach(key => {
  //   formData.append(key, data[key])
  // })

  return REQUEST({
    headers: { ...config.headers, 'Content-Type': 'multipart/form-data' },
    method: 'post',
    url,
    data: data,
  })
}

const DOWNLOAD = async (url, filename, params = {}) => {
  const response = await REQUEST({
    url,
    method: 'get',
    responseType: 'arraybuffer',
    headers: undefined,
    params: params,
  })

  downloadFile(response, filename)
}

const downloadFile = (response, filename) => {
  const href = window.URL.createObjectURL(new Blob([response]))
  const link = document.createElement('a')
  link.href = href
  link.setAttribute('download', filename)
  document.body.appendChild(link)
  link.click()
}

const onError = {
  unauthorized: () => {},
  maintenance: () => {},
  forbidden: () => {},
  notFound: () => {},
}

/* https://github.com/axios/axios#handling-errors */
const handleErrors = (error) => {
  if (error.response) {
    /**
     * The request was made and the server responded with a
     * status code that falls out of the range of 2xx
     */
    switch (error.response.status) {
    case 401: onError.unauthorized(); break
    case 403: onError.forbidden(); break
    case 404: onError.notFound(); break
    case 503: onError.maintenance(); break
    default: break
    }
  } else if (error.request) {
    /**
     * The request was made but no response was received.
     * `error.request` is an instance of XMLHttpRequest
     * in the browser and an instance of
     * http.ClientRequest in node.js
     */
  } else {
    /* Something happened in setting up the request that triggered an Error */
  }
}

const formErrors = (error) => {
  if (axios.isAxiosError(error) && error.response?.data.errors) {
    return error.response.data.errors
  }

  return {}
}

export default {
  GET,
  POST,
  DELETE,
  PUT,
  POSTFORMDATA,
  DOWNLOAD,
  formErrors,
  onError,
  config,
}