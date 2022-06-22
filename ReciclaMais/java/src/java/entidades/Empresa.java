package entidades;

public class Empresa {
    private int id;
    private String nome;
    private String cnpj;
    private String ramo;
    private String endereco;
    private String email;
    private String telefone;

    public Empresa() {
    }

    public Empresa(String nome, String cnpj, String ramo, String endereco, String email, String telefone) {
        this.nome = nome;
        this.cnpj = cnpj;
        this.ramo = ramo;
        this.endereco = endereco;
        this.email = email;
        this.telefone = telefone;
    }

    public int getId() {
        return id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getCnpj() {
        return cnpj;
    }

    public void setCnpj(String cnpj) {
        this.cnpj = cnpj;
    }

    public String getRamo() {
        return ramo;
    }

    public void setRamo(String ramo) {
        this.ramo = ramo;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public void setId(int id) {
        this.id = id;
    }
    
    
}
