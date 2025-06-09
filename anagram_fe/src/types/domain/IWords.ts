import {IDomainId} from "@/types/IDomainId";

export interface IWords extends IDomainId {
    anagrams: string[] | [];
}