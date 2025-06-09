import { EntityService } from "./EntityService";
import {IWords} from "@/types/domain/IWords";
import {IResultObject} from "@/types/IResultObject";
import {AxiosError} from "axios";

export class WordService extends EntityService<IWords, IWords> {
    constructor(){
        super('anagram')
    }
    async getAllAsyncModified(word: string): Promise<IResultObject<IWords>> {
        try {
            const url = `${this.basePath}?word=${word}`;

            const response = await this.axiosInstance.get<IWords>(url);

            console.log("getAll response", response);

            if (response.status <= 300) {
                return {
                    statusCode: response.status,
                    data: response.data,
                };
            }

            return {
                statusCode: response.status,
                errors: [(response.status.toString() + " " + response.statusText).trim()],
            };
        } catch (error) {
            console.log("error: ", (error as AxiosError).message);
            return {
                statusCode: (error as AxiosError).status ?? 0,
                errors: [(error as AxiosError).code ?? "???"],
            };
        }
    }
}

