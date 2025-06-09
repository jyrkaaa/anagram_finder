import { EntityService } from "./EntityService";
import {IWords} from "@/types/domain/IWords";
import {IResultObject} from "@/types/IResultObject";
import {AxiosError} from "axios";
import {IWordsInput} from "@/types/domain/IWordsInput";
import {IMessage} from "@/types/domain/IMessage";

export class ImportService extends EntityService<IWords, IWordsInput> {
    constructor(){
        super('wordsJson')
    }
    async addAsyncModified(entity: IWordsInput): Promise<IResultObject<IMessage>> {
        try {
            const response = await this.axiosInstance.post<IMessage>(this.basePath, entity)

            if (response.status <= 300) {
                return {
                    statusCode: response.status,
                    data: response.data
                }
            }

            return {
                statusCode: response.status,
                errors: [(response.status.toString() + ' ' + response.statusText).trim()],
            }
        } catch (error) {
            console.log('error: ', (error as AxiosError).message)
            return {
                statusCode: (error as AxiosError).status ?? 0,
                errors: [(error as AxiosError).code ?? "???"],
            }
        }
    }
}

