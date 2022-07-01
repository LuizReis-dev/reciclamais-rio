package entidades;

import java.sql.Date;

public class Funcionario {
    
    private int id;
    private String nome;
    private String telefone;
    private String usuario;
    private String senha;
    private String email;
    private Date dataDeNascimento;
    private String cpf;
    private String funcao;

    public Funcionario() {
    }
    
    
    public Funcionario(int id, String nome, String telefone, String usuario, String senha, String email, Date dataDeNascimento, String cpf, String funcao) {
        this.id = id;
        this.nome = nome;
        this.telefone = telefone;
        this.usuario = usuario;
        this.senha = senha;
        this.email = email;
        this.dataDeNascimento = dataDeNascimento;
        this.cpf = cpf;
        this.funcao = funcao;
    }

    
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getTelefone() {
        return telefone;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public String getUsuario() {
        return usuario;
    }

    public void setUsuario(String usuario) {
        this.usuario = usuario;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public Date getDataDeNascimento() {
        return dataDeNascimento;
    }

    public void setDataDeNascimento(Date dataDeNascimento) {
        this.dataDeNascimento = dataDeNascimento;
    }

    public String getCpf() {
        return cpf;
    }

    public void setCpf(String cpf) {
        this.cpf = cpf;
    }

    public String getFuncao() {
        return funcao;
    }

    public void setFuncao(String funcao) {
        this.funcao = funcao;
    }
    
}
