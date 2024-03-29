import {validateContent} from './validate';

export const ioniconContent = new Map();
const requests = new Map();
export const getSvgContent = (url, sanitize) => {
    // see if we already have a request for this url
    let req = requests.get(url);
    if (!req) {
        if (typeof fetch !== 'undefined' && typeof document !== 'undefined') {
            // we don't already have a request
            req = fetch(url).then((rsp) => {
                if (rsp.ok) {
                    return rsp.text().then((svgContent) => {
                        if (svgContent && sanitize !== false) {
                            svgContent = validateContent(svgContent);
                        }
                        ioniconContent.set(url, svgContent || '');
                    });
                }
                ioniconContent.set(url, '');
            });
            // cache for the same requests
            requests.set(url, req);
        } else {
            // set to empty for ssr scenarios and resolve promise
            ioniconContent.set(url, '');
            return Promise.resolve();
        }
    }
    return req;
};
