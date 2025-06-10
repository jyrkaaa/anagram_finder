import { EntityService } from "./EntityService";
import {IWords} from "@/types/domain/IWords";
import {IResultObject} from "@/types/IResultObject";
import {AxiosError} from "axios";
import {IWordsInput} from "@/types/domain/IWordsInput";
import {IMessage} from "@/types/domain/IMessage";
import {IUrlInput} from "@/types/domain/IUrlInput";
import {IDomainId} from "@/types/IDomainId";

export class ImportBEService extends EntityService<IDomainId, IUrlInput> {
    constructor(){
        super('words')
    }
    async addAsyncBE(entity: IUrlInput): Promise<IResultObject<IMessage>> {
        try {
            const response = await this.axiosInstance.post<IMessage>(this.basePath, entity)
            console.log(response)
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

